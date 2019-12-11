
var angApp = angular.module('myApp', ['angucomplete-alt']);

angApp.controller('AppController', function($scope, $http) {


    $scope.invoiceId        = '';
    $scope.url              = '';
    $scope.items            = [];
    $scope.total            = 0;
    $scope.subTotal         = 0;
    $scope.totalAdditon     = 0;
    $scope.totalReduction   = 0;
    $scope.reductions       = [];
    $scope.additions        = [];
    $scope.payments         = [];
    $scope.paidAmount       = 0;
    $scope.loading          = false;

    $scope.productList = function(invoice_id) {
        $scope.loading = true;

        $http({
            method : "GET",
            url : $scope.url + "/receiving/admin/invoices/items/" + invoice_id
        }).then(function mySucces(response) {
             //console.log(response.data);
            $scope.items    = response.data.items;
            $scope.total    = response.data.total;
            $scope.getSubTotal();

            $scope.additionList(invoice_id);
            $scope.reductionList(invoice_id);
            $scope.paymentList(invoice_id);
            $scope.loading  = false;
        }, function myError(response) {
            $scope.myWelcome = response.statusText;
        });

    };



    $scope.addProduct = function (selected) {
        $scope.loading = true;
        if (selected) {
            $http({
                method  : "POST",
                url     : $scope.url + "/receiving/admin/invoices/items",
                data    : $.param({product_id: selected.originalObject.id, receiving__invoice_id: $scope.invoiceId}),
                headers : {'Content-Type': 'application/x-www-form-urlencoded'}
            }).then(function mySucces(response) {
                $scope.items.push(response.data);
                $scope.getSubTotal();
                $scope.loading      = false;
                $scope.$broadcast('angucomplete-alt:clearInput');
            }, function myError(response) {
                $scope.myWelcome    = response.statusText;
                $scope.loading      = false;
            });

        } else {
            console.log('cleared');
        }
    };


    /**
     * Update product
     * @param selected
     */

    $scope.updateProduct = function (index) {

        $scope.loading      = true;

        $http({
            method  : "PUT",
            url     : $scope.url + "/receiving/admin/invoices/items/" + $scope.items[index].id,
            data    : $.param($scope.items[index]),
            headers : {'Content-Type': 'application/x-www-form-urlencoded'}
        }).then(function mySucces(response) {
            console.log(response.data);
            $scope.getSubTotal();
            $scope.getTotalAddition();
            $scope.getTotalReduction();
            $scope.loading      = false;
        }, function myError(response) {
            $scope.myWelcome    = response.statusText;
            $scope.loading      = false;
        });

    };




    $scope.deleteProduct = function(id, index) {
        $scope.loading      = true;
        $http({
            method  : "DELETE",
            url     : $scope.url + "/receiving/admin/invoices/items/" + id
        }).then(function mySucces(response) {
            if (response.data == 1){
                $scope.items.splice(index, 1);
                $scope.getSubTotal();
                $scope.loading      = false;
            }
        }, function myError(response) {
            $scope.myWelcome    = response.statusText;
            $scope.loading      = false;
        });
    };



    $scope.getSubTotal = function() {
        $scope.subTotal = 0;
        angular.forEach($scope.items, function(value, key){
            $scope.subTotal += parseInt((value.price * value.quantity ) - value.discount, 10);
        });
        $scope.getPaymentAmount();
    };




    /**
     * Start coding for Addition
     * @type {string}
     */

    $scope.additionTitle    = '';
    $scope.additionId       = '';
    $scope.additionAmount   = '';


    $scope.changeAddition = function() {
        $scope.loading      = true;
        $http({
            method  : "GET",
            url     : $scope.url + "/receiving/admin/single-add-red/" + $scope.additionId
        }).then(function mySucces(response) {
            if (response.data.id == $scope.additionId) {
                $scope.additionTitle = response.data.title;
                $scope.additionAmount = response.data.value;
                console.log(response.data.value);
            }
            $scope.loading      = false;
        }, function myError(response) {
            $scope.myWelcome    = response.statusText;
            $scope.loading      = false;
        });

    };


    $scope.addAddition = function() {
        $scope.loading      = true;
        if($scope.additionTitle != '' && $scope.additionAmount != '') {
            $http({
                method  : "POST",
                url     : $scope.url + "/receiving/admin/additions",
                data    : $.param({additionId: $scope.additionId, title: $scope.additionTitle, amount: $scope.additionAmount, receiving__invoice_id: $scope.invoiceId}),
                headers : {'Content-Type': 'application/x-www-form-urlencoded'}
            }).then(function mySucces(response) {
                $scope.additions.push(response.data);
                $scope.additionTitle    = '';
                $scope.additionId       = '';
                $scope.additionAmount   = '';
                $scope.getTotalAddition();
                $scope.loading      = false;
            }, function myError(response) {
                $scope.myWelcome    = response.statusText;
                $scope.loading      = false;
            });
        }
    };


    $scope.additionList = function(invoice_id) {
        $http({
            method  : "POST",
            url     : $scope.url + "/receiving/admin/additions/" + invoice_id
        }).then(function mySucces(response) {
            angular.forEach(response.data, function(value, key) {
                $scope.additions.push(value);
            });
            $scope.getTotalAddition();
        }, function myError(response) {
            $scope.myWelcome    = response.statusText;
        });

    };



    $scope.additionDelete = function(id, index) {
        $scope.loading      = true;
        $http({
            method  : "DELETE",
            url     : $scope.url + "/receiving/admin/additions/delete/" + id
        }).then(function mySucces(response) {
            if (response.data == 1) {
                $scope.additions.splice(index, 1);
                $scope.getTotalAddition();
            }
            $scope.loading      = false;
        }, function myError(response) {
            $scope.myWelcome    = response.statusText;
            $scope.loading      = false;
        });
    };





    $scope.getTotalAddition = function() {
        $scope.getSubTotal();
        $scope.totalAdditon = 0;
        var amount = 0;
        angular.forEach($scope.additions, function(value, key){
            amount = parseInt(value.amount, 10);
            $scope.totalAdditon += (value.type == 'percentage') ? ($scope.subTotal * amount)/100 : amount;
        });

        $scope.getPaymentAmount();
    };




    /**
     * Start coding for Reduction
     * @type {string}
     */

    $scope.reductionTitle    = '';
    $scope.reductionId      = '';
    $scope.reductionAmount   = '';


    $scope.changeReduction = function() {
        $scope.loading      = true;
        $http({
            method  : "GET",
            url     : $scope.url + "/receiving/admin/single-add-red/" + $scope.reductionId
        }).then(function mySucces(response) {
            if (response.data.id == $scope.reductionId) {
                console.log(response.data);
                $scope.reductionTitle = response.data.title;
                $scope.reductionAmount = response.data.value;
                console.log(response.data.value);
            }
            $scope.loading      = false;
        }, function myError(response) {
            $scope.myWelcome    = response.statusText;
            $scope.loading      = false;
        });

    };


    $scope.addReduction = function() {
        $scope.loading      = true;
        if($scope.reductionTitle != '' && $scope.reductionAmount != '') {
            $http({
                method  : "POST",
                url     : $scope.url + "/receiving/admin/reductions",
                data    : $.param({reductionId: $scope.reductionId, title: $scope.reductionTitle, amount: $scope.reductionAmount, receiving__invoice_id: $scope.invoiceId}),
                headers : {'Content-Type': 'application/x-www-form-urlencoded'}
            }).then(function mySucces(response) {
                $scope.reductions.push(response.data);
                $scope.getTotalReduction();
                $scope.reductionTitle    = '';
                $scope.reductionId       = '';
                $scope.reductionAmount   = '';
                $scope.loading      = false;
            }, function myError(response) {
                $scope.myWelcome    = response.statusText;
                $scope.loading      = false;
            });
        }

    };


    $scope.reductionList = function(invoice_id) {

        $http({
            method  : "POST",
            url     : $scope.url + "/receiving/admin/reductions/" + invoice_id
        }).then(function mySucces(response) {
            angular.forEach(response.data, function(value, key) {
                $scope.reductions.push(value);
            });
            $scope.getTotalReduction();
        }, function myError(response) {
            $scope.myWelcome    = response.statusText;
        });
    };


    $scope.reductionDelete = function(id, index) {
        $scope.loading      = true;
        $http({
            method  : "DELETE",
            url     : $scope.url + "/receiving/admin/reductions/delete/" + id
        }).then(function mySucces(response) {
            if (response.data == 1) {
                $scope.reductions.splice(index, 1);
                $scope.getTotalReduction()
            }
            $scope.loading      = false;
        }, function myError(response) {
            $scope.myWelcome    = response.statusText;
            $scope.loading      = false;
        });
    };




    $scope.getTotalReduction = function() {
        $scope.totalReduction = 0;
        angular.forEach($scope.reductions, function(value, key){
            amount = parseInt(value.amount, 10);
            $scope.totalReduction += (value.type == 'percentage') ? ($scope.subTotal * amount)/100 : amount;
        });
        $scope.getPaymentAmount();
    };


    /**
     * Get details of a addition
     */


    $scope.paymentMethod    = '1';
    $scope.transectionID    = '';
    $scope.paymentAmount    = '';


    $scope.paymentList = function(invoice_id) {
        $http({
            method  : "POST",
            url     : $scope.url + "/receiving/admin/payments/" + invoice_id
        }).then(function mySucces(response) {
            console.log(response.data);
            angular.forEach(response.data, function(value, key) {
                $scope.payments.push(value);
            });
            $scope.getTotalPayment();
        }, function myError(response) {
            $scope.myWelcome    = response.statusText;
        });
    };


    $scope.addPayment = function() {
        $scope.loading      = true;
        if($scope.paymentMethod != 0 && $scope.paymentAmount > 0) {
            $http({
                method  : "POST",
                url     : $scope.url + "/receiving/admin/payments",
                data    : $.param({payment_methods_id: $scope.paymentMethod, amount: $scope.paymentAmount, receiving__invoice_id: $scope.invoiceId}),
                headers : {'Content-Type': 'application/x-www-form-urlencoded'}
            }).then(function mySucces(response) {
                $scope.payments.push(response.data);
                $scope.getTotalPayment();
                $scope.paymentMethod    = 1;
                $scope.transectionID    = '';
                $scope.loading      = false;
            }, function myError(response) {
                $scope.myWelcome    = response.statusText;
                $scope.loading      = false;
            });
        }

    };


    $scope.paymentDelete = function(id, index) {
        $scope.loading      = true;
        $http({
            method  : "DELETE",
            url     : $scope.url + "/receiving/admin/payments/delete/" + id
        }).then(function mySucces(response) {
            if (response.data == 1) {
                $scope.payments.splice(index, 1);
                $scope.getTotalPayment();
            }
            $scope.loading      = false;
        }, function myError(response) {
            $scope.myWelcome    = response.statusText;
            $scope.loading      = false;
        });
    };


    $scope.getTotalPayment = function() {
        $scope.paidAmount = 0;
        angular.forEach($scope.payments, function(value, key){
            amount = parseInt(value.amount, 10);
            $scope.paidAmount += amount;
        });
        $scope.getPaymentAmount();
    };



    $scope.getPaymentAmount = function () {
        $scope.paymentAmount    = (( $scope.subTotal + $scope.totalAdditon ) - $scope.totalReduction) -  $scope.paidAmount
    };



});