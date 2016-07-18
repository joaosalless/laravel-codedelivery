angular.module('starter.controllers')
  .controller('ClientSettingsController', [
    '$scope', 'appConfig', 'UserData',
    function($scope, appConfig, UserData) {
      'use strict';
      $scope.app = appConfig;
      $scope.user = UserData.get();
    }
  ]);
