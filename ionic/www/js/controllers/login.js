angular.module('starter.controllers')
  .controller('LoginController', [
    '$scope', '$auth', '$cordovaTouchID',
    function($scope, $auth, $cordovaTouchID) {
      'use strict';

      $scope.user = {
        username: 'user@user.com',
        password: '123456'
      };

      $scope.isSupportTouchID = false;

      $scope.login = function() {
        $auth.login($scope.user.username, $scope.user.password);
      };

      if (ionic.Platform.isWebView() && ionic.Platform.isIOS() && ionic.Platform.isIpad()) {
        $cordovaTouchID.checkSupport().then(function() {
          $scope.isSupportTouchID = true;
        });
      }
    }
  ]);
