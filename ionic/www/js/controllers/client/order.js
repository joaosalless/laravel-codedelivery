angular.module('starter.controllers')
    .controller('ClientOrderController', [
        '$scope', '$state', '$ionicLoading', 'Order',
        function ($scope, $state, $ionicLoading, Order) {

            'use strict';

            $scope.items = [];

            $ionicLoading.show({
                template: 'Carregando...'
            });

            Order.query({id: null}, function (data) {
                $scope.items = data.data;
                $ionicLoading.hide();
                console.log($scope.order);

            }, function (dataError) {
                $ionicLoading.hide();
            });
        }
    ]);
