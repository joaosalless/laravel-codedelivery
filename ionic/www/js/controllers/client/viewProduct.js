angular.module('starter.controllers')
    .controller('ClientViewProductController', [
        '$scope', '$state', 'Product', '$ionicLoading', '$cart',
        function ($scope, $state, Product, $ionicLoading, $cart) {

            'use strict';

            $scope.products = [];
            $ionicLoading.show({
                template: 'Carregando...'
            });

            $scope.doRefresh = function () {
                getProducts().then(function (data) {
                    $scope.products = data.data;
                    $scope.$broadcast('scroll.refreshComplete');
                }, function (dataError) {
                    $scope.$broadcast('scroll.refreshComplete');
                });
            };

            function getProducts() {
                return Product.query({search: $scope.searchKeyword}).$promise;
            }

            getProducts().then(function (data) {
                $scope.products = data.data;
                $ionicLoading.hide();
            }, function (dataError) {
                $ionicLoading.hide();
            });

            $scope.addItem = function (item) {
                item.qtd = 1;
                $cart.addItem(item);
                $state.go('client.checkout');
            };
        }
    ]);
