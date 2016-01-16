
angular.module('starter.controllers')
    .controller('ClientCheckoutController', [
        '$scope', '$state', 'cart', '$localStorage',
        function ($scope, $state, cart, $localStorage) {
            $scope.items = cart.items;
            console.log($localStorage.getObject('cart') == null);
        }
    ]);
