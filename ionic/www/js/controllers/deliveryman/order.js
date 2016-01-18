angular.module('starter.controllers')
    .controller('DeliverymanOrderController', [
        '$scope', '$state', '$ionicLoading', 'DeliverymanOrder',
        function ($scope, $state, $ionicLoading, DeliverymanOrder) {

            'use strict';

            $scope.items = [];

            $ionicLoading.show({
                template: 'Carregando...'
            });

            $scope.doRefresh = function () {
                getOrders().then(function (data) {
                    $scope.items = data.data;
                    $scope.$broadcast('scroll.refreshComplete');
                }, function (dataError) {
                    $scope.$broadcast('scroll.refreshComplete');
                });
            };

            $scope.openOrderDetail = function (order) {
                $state.go('deliveryman.view_order', {id: order.id});
            };

            function getOrders() {
                return DeliverymanOrder.query({
                    id: null,
                    orderBy: 'created_at',
                    sortedBy: 'desc'
                }).$promise;
            }

            getOrders().then(function (data) {
                $scope.items = data.data;
                $ionicLoading.hide();
            }, function (dataError) {
                $ionicLoading.hide();
            });
        }
    ]);
