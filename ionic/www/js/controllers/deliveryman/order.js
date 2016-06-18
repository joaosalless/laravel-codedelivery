angular.module('starter.controllers')
  .controller('DeliverymanOrderController', [
    '$scope', '$state', '$ionicLoading', '$ionicActionSheet', 'DeliverymanOrder', '$timeout',
    function($scope, $state, $ionicLoading, $ionicActionSheet, DeliverymanOrder, $timeout) {
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
        $state.go('deliveryman.view_order', {
          id: order.id
        });
      };

      $scope.loadMore = function() {
        getOrders().then(function(data) {
          $scope.items = $scope.items.concat(data.data);
          if ($scope.items.length == data.meta.pagination.total) {
            $scope.canMoreItems = false;
          }
          page = page + 1;
          $scope.$broadcast('scroll.infiniteScrollComplete');
        });
      };

      function getOrders() {
        return DeliverymanOrder.query({
          id: null,
          page: page,
          include: 'deliveryman',
          orderBy: 'created_at',
          sortedBy: 'desc'
        }).$promise;
      }
    }
  ]);
