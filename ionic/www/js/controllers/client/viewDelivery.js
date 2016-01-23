angular.module('starter.controllers')
    .controller('ClientViewDeliveryController', [
        '$scope', '$stateParams', 'ClientOrder', '$ionicLoading',
        function ($scope, $stateParams, ClientOrder, $ionicLoading) {
            'use strict';
            $scope.order = {};

            $scope.map = {
                center: {
                    latitude: -23.4444,
                    longitude: -46.4444
                },
                zoom: 16
            };

            $ionicLoading.show({
                template: 'Carregando...'
            });

            ClientOrder.get({id: $stateParams.id, include: 'items,cupom,client'}, function (data) {
                $scope.order = data.data;
                $ionicLoading.hide();
            }, function (dataError) {
                $ionicLoading.hide();
            });
        }
    ]);
