angular.module('starter.controllers')
    .controller('ClientViewDeliveryController', [
        '$scope', '$stateParams', 'ClientOrder', '$ionicLoading', '$ionicPopup', 'UserData',
        function ($scope, $stateParams, ClientOrder, $ionicLoading, $ionicPopup, UserData) {
            'use strict';
            $scope.order = {};

            $scope.map = {
                center: {
                    latitude: -23.4444,
                    longitude: -46.4444
                },
                zoom: 12
            };

            $scope.markers = [];

            $ionicLoading.show({
                template: 'Carregando...'
            });

            ClientOrder.get({id: $stateParams.id, include: 'items,cupom,client'}, function (data) {
                $scope.order = data.data;
                $ionicLoading.hide();
                if (parseInt($scope.order.status, 10) == 1) {
                    initMarkers();
                } else {
                    $ionicPopup.alert({
                        title: 'Advertência',
                        template: 'Pedido não está em status de entrega.'
                    });
                }
            }, function (dataError) {
                $ionicLoading.hide();
            });

            function initMarkers() {
                var client = UserData.get().client.data,
                    address = client.zipcode + ', ' +
                        client.address + ', ' +
                        client.city + ' - ' +
                        client.state
                createMarkerClient(address);
            }

            function createMarkerClient(address) {
                var geocoder = new google.maps.Geocoder();
                geocoder.geocode({
                    address: address
                }, function (results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {

                    } else {
                        $ionicPopup.alert({
                            title: 'Advertência',
                            template: 'Não foi possível encontrar seu endereço.'
                        });
                    }
                });
            }
        }
    ]);
