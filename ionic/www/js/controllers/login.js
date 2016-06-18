angular.module('starter.controllers')
  .controller('LoginController', [
    '$scope', 'OAuth', 'OAuthToken', '$state', '$ionicPopup', 'UserData', 'User', 'appConfig', '$localStorage', '$redirect',
    function($scope, OAuth, OAuthToken, $state, $ionicPopup, UserData, User, appConfig, $localStorage, $redirect) {
      'use strict';

      $scope.app = appConfig;
      $scope.user = {
        username: 'user@user.com',
        password: '123456'
      };

      $scope.login = function() {
        var promise = OAuth.getAccessToken($scope.user);
        promise
          .then(function(data) {
            /*jshint camelcase: false */
            var token = $localStorage.get('device_token');
            return User.updateDeviceToken({}, {
              device_token: token
            }).$promise;
          })
          .then(function(data) {
            return User.authenticated({
              include: 'client'
            }).$promise;
          })
          .then(function(data) {
            UserData.set(data.data);
            $redirect.redirectAfterLogin();
          }, function(responseError) {
            UserData.set(null);
            OAuthToken.removeToken();
            $ionicPopup.alert({
              title: 'Advertência',
              template: 'Login e/ou senha inválidos'
            });
            console.log(responseError);
          });
      };
    }
  ]);
