angular.module('starter.controllers')
  .controller('DeliverymanMenuController', [
    '$scope', 'appConfig', 'UserData', '$state',
    function($scope, appConfig, UserData, $state) {
      'use strict';
      $scope.app = appConfig;
      $scope.user = UserData.get();

      $scope.logout = function() {
        $state.go('logout');
      };
    }
  ]);
