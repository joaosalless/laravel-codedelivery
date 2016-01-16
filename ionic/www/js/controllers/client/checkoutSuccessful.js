angular.module('starter.controllers')
    .controller('ClientCheckoutSuccessfulController', [
        '$scope', '$state', '$cart', function ($scope, $state, $cart) {

            'use strict';

            var cart = $cart.get();
            $scope.items = cart.items;
            $scope.total = cart.total;
            $cart.clear();

            $scope.openListOrders = function() {

            };
        }
    ]);
