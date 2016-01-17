angular.module('starter.controllers')
    .controller('ClientCheckoutSuccessfulController', [
        '$scope', '$state', '$cart', function ($scope, $state, $cart) {

            'use strict';

            var cart = $cart.get();
            $scope.cupom = cart.cupom;
            $scope.items = cart.items;
            $scope.total = $cart.getTotalFinal();
            $cart.clear();

            $scope.openListOrders = function () {
                $state.go('client.order');
            };
        }
    ]);
