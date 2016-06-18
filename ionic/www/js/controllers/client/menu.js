angular.module('starter.controllers')
  .controller('ClientMenuController', [
    '$scope', 'appConfig', 'UserData', '$state', '$cordovaTouchID',
    function($scope, appConfig, UserData, $state, $cordovaTouchID) {
      'use strict';
      $scope.app = appConfig;
      $scope.user = UserData.get();

      $scope.isSupportTouchID = false;

      $scope.logout = function() {
        $state.go('logout');
      };

      if (ionic.Platform.isWebView() && ionic.Platform.isIOS() && ionic.Platform.isIpad()) {
        $cordovaTouchID.checkSupport().then(function() {
          $scope.isSupportTouchID = true;
        });
      }
    }
  ]);
