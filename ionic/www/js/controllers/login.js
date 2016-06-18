angular.module('starter.controllers')
  .controller('LoginController', [
    '$scope', '$auth', '$cordovaTouchID', '$cordovaKeychain', '$ionicPopup',
    function($scope, $auth, $cordovaTouchID, $cordovaKeychain, $ionicPopup) {
      'use strict';

      $scope.user = {
        username: 'user@user.com',
        password: '123456'
      };

      $scope.isSupportTouchID = false;

      $scope.loginWithTouchID = function() {
        if ($scope.isSupportTouchID) {
          $cordovaTouchID.authenticate('Posicione o dedo para autenticar').then(function() {
            var promise = $cordovaKeychain.getForKey('username', 'codedelivery');
            var username = null;
            promise
              .then(function(value) {
                username = value;
                $cordovaKeychain.getForKey('password', 'codedelivery');
              })
              .then(function(value) {
                $auth.login(username, value);
              }, function() {
                $ionicPopup.alert({
                  title: 'Advertência',
                  template: 'Login e/ou senha inválidos'
                });
              });
          }, function() {
            // error
          });
        }
      };

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
