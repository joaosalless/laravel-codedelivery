angular.module('starter.controllers')
  .controller('TouchIDController', [
    '$scope', '$ionicPopup', 'UserData', 'OAuth', '$cordovaKeychain',
    function($scope, $ionicPopup, UserData, OAuth, $cordovaKeychain) {
      'use strict';

      $scope.user = {
        username: UserData.get().email,
        password: ''
      };

      $scope.login = function() {
        $scope.user.username = UserData.get().email;
        var promise = OAuth.getAccessToken($scope.user);
        promise
          .then(function() {
            return $cordovaKeychain.setForKey('username', 'codedelivery', $scope.user.username)
          })
          .then(function() {
            return $cordovaKeychain.setForKey('password', 'codedelivery', $scope.user.password)
          })
          .then(function() {
            $ionicPopup.alert({
              title: 'Informação',
              template: 'TouchID habilitado'
            });
          }, function() {
            $ionicPopup.alert({
              title: 'Advertência',
              template: 'Login e/ou senha inválidos'
            });
          });
      };
    }
  ]);
