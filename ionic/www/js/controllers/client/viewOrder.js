angular.module('starter.controllers')
    .controller('ClientViewOrderController', [
        '$scope', '$stateParams', 'ClientOrder', '$ionicLoading',
        function ($scope, $stateParams, ClientOrder, $ionicLoading) {
            'use strict';
            $scope.order = {};
            $ionicLoading.show({
                template: 'Carregando...'
            });

            ClientOrder.get({id: $stateParams.id, include: 'items, cupom'}, function (data) {
                $scope.order = data.data;
                $ionicLoading.hide();
            }, function (dataError) {
                $ionicLoading.hide();
            });
        }
    ]);
