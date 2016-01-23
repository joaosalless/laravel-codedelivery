angular.module('starter.controllers')
    .controller('ClientViewDeliveryController', [
        '$scope',
        '$stateParams',
        'ClientOrder',
        '$ionicLoading',
        '$ionicPopup',
        'UserData',
        '$pusher',
        '$window',
        function (
            $scope,
            $stateParams,
            ClientOrder,
            $ionicLoading,
            $ionicPopup,
            UserData,
            $pusher,
            $window
        ) {
            'use strict';

            var iconUrl = 'http://maps.google.com/mapfiles/kml/pal2';
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
                    initMarkers($scope.order);
                } else {
                    $ionicPopup.alert({
                        title: 'Advertência',
                        template: 'Pedido não está em status de entrega.'
                    });
                }
            }, function (dataError) {
                $ionicLoading.hide();
            });

            function initMarkers(order) {
                var client = UserData.get().client.data,
                    address = client.zipcode + ', ' +
                        client.address + ', ' +
                        client.city + ' - ' +
                        client.state
                createMarkerClient(address);
                watchPositionDeliveryman(order.hash);
            }

            function createMarkerClient(address) {
                var geocoder = new google.maps.Geocoder();
                geocoder.geocode({
                    address: address
                }, function (results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        var lat  = results[0].geometry.location.lat() ,
                            long = results[0].geometry.location.lng();

                        $scope.markers.push({
                            id: 'client',
                            coords: {
                                latitude: lat,
                                longitude: long
                            },
                            options: {
                                title: 'Local de entrega',
                                icon: iconUrl + '/icon2.png'
                            }
                        });
                    } else {
                        $ionicPopup.alert({
                            title: 'Advertência',
                            template: 'Não foi possível encontrar seu endereço.'
                        });
                    }
                });
            }

            function watchPositionDeliveryman(channel) {
                var pusher  = $pusher($window.client),
                    channel = pusher.subscribe(channel);
                channel.bind('CodeDelivery\\Events\\GetLocationDeliveryman', function (data) {
                    console.log(data);
                })
            }
        }
    ]);
