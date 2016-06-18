angular.module('starter.controllers')
  .controller('ClientProductShowController', [
    '$scope', '$state', '$stateParams', 'Product', '$cart', '$ionicLoading',
    function($scope, $state, $stateParams, Product, $cart, $ionicLoading) {
      'use strict';
      $scope.produto = {};
      $ionicLoading.show({
        template: 'Carregando...'
      });

      $scope.addItem = function(item) {
        item.qtd = 1;
        $cart.addItem(item);
        $state.go('client.checkout');
      };

      $scope.updateQtd = function() {
        $cart.updateQtd($stateParams.id, $scope.produto.qtd);
        $state.go('client.checkout');
      };

      Product.get({
        id: $stateParams.id
      }, function(data) {
        $scope.produto = data.data;
        $ionicLoading.hide();
      }, function(dataError) {
        $ionicLoading.hide();
      });
    }
  ]);
