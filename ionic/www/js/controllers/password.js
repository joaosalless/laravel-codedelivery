angular.module('starter.controllers')
  .controller('PasswordController', [
    '$scope', 'appConfig', 'UserData',
    function($scope, appConfig, UserData) {
      'use strict';
      $scope.app = appConfig;
      $scope.user = UserData.get();

      $scope.updateProfile = function() {
        //
      };
    }
  ]);
