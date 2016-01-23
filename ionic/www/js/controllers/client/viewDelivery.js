angular.module('starter.controllers')
    .controller('ClientViewDeliveryController', [
        '$scope', '$stateParams', 'ClientOrder', '$ionicLoading', '$ionicPopup', UserData,
        function ($scope, $stateParams, ClientOrder, $ionicLoading $ionicPopup, UserData) {
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
                if ($scope.order.status === 1) {
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
                'use strict';
                var client = UserData.get().client,
                    address = client.zipcode + ', ' +
                        client.address + ', ' +
                        client.city + ' - ' +
                        client.state
                createMarkerClient(address);
            }

            function createMarkerClient(address) {

            }
        }
    ]);
