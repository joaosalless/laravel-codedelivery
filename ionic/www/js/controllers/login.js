angular.module('starter.controllers')
  .controller('LoginController', [
    '$scope',
    '$auth',
    '$cordovaOauth',
    '$cordovaTouchID',
    '$cordovaKeychain',
    '$cordovaNetwork',
    '$ionicPopup',
    function(
      $scope,
      $auth,
      $cordovaOauth,
      $cordovaTouchID,
      $cordovaKeychain,
      $ionicPopup,
      $cordovaNetwork) {
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
            var password = null;
            promise
              .then(function(value) {
                username = value;
                return $cordovaKeychain.getForKey('password', 'codedelivery');
              })
              .then(function(value) {
                password = value;
              }, function() {
                $ionicPopup.alert({
                  title: 'Advertência',
                  template: 'Login e/ou senha inválidos'
                });
              });
            if (username != null && password != null) {
              $auth.login(username, value);
            }
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

      $scope.facebookLogin = function() {
        $cordovaOauth.facebook("1748749808700571", ["email"]).then(function(result) {
          console.log("Facebook Login Response Object -> " + JSON.stringify(result));
        }, function(error) {
          console.log("Facebook Login Error -> " + error);
        });
      }
    }
  ]);
