angular.module('starter.controllers')
    .controller('DeliverymanViewOrderController', [
        '$scope', '$stateParams', 'DeliverymanOrder', '$ionicLoading',
        function ($scope, $stateParams, DeliverymanOrder, $ionicLoading) {
            'use strict';
            $scope.order = {};
            $ionicLoading.show({
                template: 'Carregando...'
            });

            DeliverymanOrder.get({id: $stateParams.id, include: 'items, cupom'}, function (data) {
                $scope.order = data.data;
                $ionicLoading.hide();
            }, function (dataError) {
                $ionicLoading.hide();
            });

            DeliverymanOrder.updateStatus({id: $stateParams.id}, function (data) {
                console.log(data);
            });

            DeliverymanOrder.geo({id: $stateParams.id}, {lat: -23.4444, long: -25.4444}, function (data) {
                console.log(data);
            });
        }
    ]);
