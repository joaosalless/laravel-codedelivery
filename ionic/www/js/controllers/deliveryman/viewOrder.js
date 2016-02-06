angular.module('starter.controllers')
    .controller('DeliverymanViewOrderController', [
        '$scope', '$stateParams', 'DeliverymanOrder', '$ionicLoading', '$ionicPopup', '$cordovaGeolocation',
        function ($scope, $stateParams, DeliverymanOrder, $ionicLoading, $ionicPopup, $cordovaGeolocation) {
            'use strict';

            var watch, lat = null, long;

            $scope.order = {};
            $ionicLoading.show({
                template: 'Carregando...'
            });

            DeliverymanOrder.get({id: $stateParams.id, include: 'items,cupom,client'}, function (data) {
                $scope.order = data.data;
                $ionicLoading.hide();
            }, function (dataError) {
                $ionicLoading.hide();
            });

            $scope.goToDelivery = function () {
                $ionicPopup.alert({
                    title: 'Advertência',
                    template: 'Para parar a localização pressione Ok.'
                }).then(function () {
                    stopWatchPosition();
                });

                DeliverymanOrder.updateStatus({id: $stateParams.id}, {status: 1}, function () {
                    var watchOptions = {
                        timeout: 3000,
                        enableHighAccurace: false
                    };

                    watch = $cordovaGeolocation.watchPosition(watchOptions);
                    watch.then(
                        null,
                        function (responseError) {
                            // error
                        },
                        function (position) {
                            if (!lat) {
                                lat  = position.coords.latitude;
                                long = position.coords.longitude;
                            } else {
                                // lat -= -0.0444;
                            }
                            DeliverymanOrder.geo({id: $stateParams.id}, {
                                lat,
                                long
                            });
                        });
                });

                function stopWatchPosition() {
                    if (watch && typeof watch === 'object' && watch.hasOwnProperty('watchID')) {
                        $cordovaGeolocation.clearWatch(watch.watchID);
                    }
                }
            };

            $scope.setOrderDelivered = function () {
                DeliverymanOrder.updateStatus({id: $stateParams.id}, {status: 2}, function (data) {

                });
            };
        }
    ]);
