angular.module('starter.controllers')
  .controller('ClientOrderController', [
    '$scope', '$state', '$ionicLoading', '$ionicActionSheet', 'ClientOrder', '$timeout',
    function($scope, $state, $ionicLoading, $ionicActionSheet, ClientOrder, $timeout) {
      'use strict';

      var page = 1;
      $scope.items = [];
      $scope.canMoreItems = true;

      $scope.doRefresh = function() {
        page = 1;
        $scope.items = [];
        $scope.canMoreItems = true;
        $scope.loadMore();
        $timeout(function() {
          $scope.$broadcast('scroll.refreshComplete');
        }, 200);
      };

      $scope.openOrderDetail = function(order) {
        $state.go('client.view_order', {
          id: order.id
        });
      };

      $scope.showActionSheet = function(order) {
        $ionicActionSheet.show({
          buttons: [
            {
              text: 'Ver detalhes'
            },
            {
              text: 'Ver entrega'
            }
          ],
          titleText: 'O que fazer?',
          cancelText: 'Cancelar',
          //   destructiveText: 'Excluir',
          cancel: function() {
            // console.log('cancel button pressed.');
          },
          buttonClicked: function(index) {
            switch (index) {
              case 0:
                $state.go('client.view_order', {
                  id: order.id
                });
                break;
              case 1:
                $state.go('client.view_delivery', {
                  id: order.id
                });
                break;
            }
          }
        });
      };

      function getOrders() {
        return ClientOrder.query({
          id: null,
          page: page,
          search: $scope.searchKeyword,
          orderBy: 'created_at',
          sortedBy: 'desc',
          include: 'cupom'
        }).$promise;
      }

      $scope.loadMore = function() {
        getOrders().then(function(data) {
          $scope.pagination = data.meta.pagination;

          if ($scope.items.length >= $scope.pagination.total) {
            $scope.items = [];
          }

          $scope.items = $scope.items.concat(data.data);

          if ($scope.items.length == data.meta.pagination.total) {
            $scope.canMoreItems = false;
          }
          page = page + 1;
          $scope.$broadcast('scroll.infiniteScrollComplete');
        });
      };
    }
  ]);
