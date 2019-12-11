$(document).ready(function(){
    $(".dropdown").hover(
        function() {
            $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true,true).slideDown();
            $(this).toggleClass('open');
        },
        function() {
            $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true,true).slideUp();
            $(this).toggleClass('open');
        }
    );
});



angular.module('MaterialApp', ['ngMaterial'])

    .controller('AppCtrl', function($scope) {
        $scope.title1 = 'Button';
        $scope.title4 = 'Warn';
        $scope.isDisabled = true;

        $scope.googleUrl = 'http://google.com';

    });

