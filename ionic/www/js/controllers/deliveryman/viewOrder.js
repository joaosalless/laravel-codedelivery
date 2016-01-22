angular.module('starter.controllers')
    .controller('DeliverymanViewOrderController', [
        '$scope', '$stateParams', 'DeliverymanOrder', '$ionicLoading', '$cordovaGeolocation',
        function ($scope, $stateParams, DeliverymanOrder, $ionicLoading, $cordovaGeolocation) {
            'use strict';

            var watch;

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

            // $scope.goToDelivery = function () {
                // $ionicPopup.alert({
                //     title: 'Advertência',
                //     template: 'Para parar a localização pressione Ok.'
                // });

                DeliverymanOrder.updateStatus({id: $stateParams.id}, {status: 1}, function () {
                    var watchOptions = {
                        timeout: 3000,
                        enableHighAccurace: false
                    };

                    watch = $cordovaGeolocation.watchPosition(watchOptions);
                    watch.then(
                        null,
                        function (responseError) {

                        },
                        function (position) {
                            DeliverymanOrder.geo({id: $stateParams.id}, {
                                lat: position.coords.latitude,
                                long: position.coords.longitude
                            });
                        });
                });
            // };


        }
    ]);
