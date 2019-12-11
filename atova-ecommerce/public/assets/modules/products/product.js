
var angApp = angular.module('myApp', []);

angApp.controller('AppController', function($scope, $http) {

    $scope.url                  = '';
    $scope.title                = '';
    $scope.slug                 = '';
    $scope.test                 = 1;
    $scope.specificationGroup   = '';
    $scope.specifications       = [];

    $scope.product_code = '';
    $scope.price = '';

    $scope.increase = function() {
        $scope.test += 1;
    };


    /**
     * fill products slugs
     */

    $scope.getSlug = function () {
        $scope.slug = $scope.title.toLowerCase();
        $scope.slug = $scope.slug.replace(/ /g , "-");
    };


    /**
     * Get attributes list of a Attribute Group
     */

    $scope.getSpecifications = function() {
        $http({
            method : "GET",
            url : $scope.url + "/product/admin/specifications/" + $scope.specificationGroup
        }).then(function mySucces(response) {
            $scope.specifications    = response.data;
            $scope.loading  = false;
        }, function myError(response) {
            $scope.myWelcome = response.statusText;
        });
    };


    /**
     * Get attributes list of a Product
     */

    $scope.productSpecifications = function(product_id) {
        $http({
            method : "GET",
            url : $scope.url + "/product/admin/specifications/product/" + product_id
        }).then(function mySucces(response) {
            console.log(response.data);
            $scope.specifications    = response.data;
            $scope.loading  = false;
        }, function myError(response) {
            $scope.myWelcome = response.statusText;
        });
    };



    $scope.formSubmit = function() {
        alert(1);
    };


});




angApp.filter('range', function() {
    return function(input, total) {
        total = parseInt(total);

        for (var i=0; i<total; i++) {
            input.push(i);
        }

        return input;
    };
});

