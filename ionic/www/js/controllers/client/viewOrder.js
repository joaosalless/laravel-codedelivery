angular.module('starter.controllers')
    .controller('ClientViewOrderController', [
        '$scope', '$stateParams', 'Order', '$ionicLoading',
        function ($scope, $stateParams, Order, $ionicLoading) {
            'use strict';
            $scope.order = {};
            $ionicLoading.show({
                template: 'Carregando...'
            });

            Order.get({id: $stateParams.id, include: 'items, cupom'}, function (data) {
                $scope.order = data.data;
                $ionicLoading.hide();
            }, function (dataError) {
                $ionicLoading.hide();
            });
        }
    ]);
