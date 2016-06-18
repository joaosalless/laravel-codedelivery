angular.module('starter.controllers')
  .controller('ClientProductIndexController', [
    '$scope', '$state', 'Product', '$ionicLoading', '$ionicActionSheet', '$cart', '$timeout',
    function($scope, $state, Product, $ionicLoading, $ionicActionSheet, $cart, $timeout) {
      'use strict';

      var page = 1;
      $scope.products = [];
      $scope.canMoreItems = true;

      $scope.doRefresh = function() {
        page = 1;
        $scope.products = [];
        $scope.canMoreItems = true;
        $scope.loadMore();
        $timeout(function() {
          $scope.$broadcast('scroll.refreshComplete');
        }, 100);
      };

      $scope.openProductDetail = function(product) {
        $state.go('client.product_show', {
          id: product.id
        });
      };

      $scope.addItem = function(item) {
        item.qtd = 1;
        $cart.addItem(item);
        $state.go('client.checkout');
      };

      $scope.loadMore = function() {
        getProducts().then(function(data) {
          $scope.pagination = data.meta.pagination;

          if ($scope.products.length >= $scope.pagination.total) {
            $scope.products = [];
          }

          $scope.products = $scope.products.concat(data.data);

          if ($scope.products.length == data.meta.pagination.total) {
            $scope.canMoreItems = false;
          }
          page = page + 1;
          $scope.$broadcast('scroll.infiniteScrollComplete');
        });
      };

      function getProducts() {
        return Product.query({
          id: null,
          page: page,
          search: $scope.searchKeyword,
          orderBy: 'created_at',
          sortedBy: 'desc'
        }).$promise;
      }

      $scope.showActionSheet = function(product) {
        $ionicActionSheet.show({
          buttons: [
            {
              text: 'Ver detalhes'
            },
            {
              text: 'Adicionar ao pedido'
            }
          ],
          titleText: 'O que fazer?',
          cancelText: 'Cancelar',
          addCancelButtonWithLabel: 'Cancel',
          androidEnableCancelButton: true,
          cancel: function() {
            //
          },
          buttonClicked: function(index) {
            switch (index) {
              case 0:
                $state.go('client.product_show', {
                  id: product.id
                });
                break;
              case 1:
                $scope.addItem(product);
                break;
            }
          }
        });
      };
    }
  ]);
