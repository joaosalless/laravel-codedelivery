angular.module('starter.controllers')
  .controller('ClientSettingsProfileController', [
    '$scope', 'appConfig', 'UserData', 'User',
    function($scope, appConfig, UserData, User) {
      'use strict';
      $scope.app = appConfig;
      $scope.user = UserData.get();

      $scope.updateProfile = function() {
        User.updateProfile({
          id: null
        }, $scope.user, function() {
          User.authenticated({
            include: 'client'
          }, function(data) {
            UserData.set(data.data);
            $scope.user = UserData.get();
            console.log($scope.user);
          });
        //   UserData.set(data);
        //   $scope.user = UserData.get();
        });
      };

      //   $scope.updateProfile = function() {
      //
      //     //   .then(function(data) {
      //     //     return User.authenticated({
      //     //       include: 'client'
      //     //     }).$promise;
      //     //   })
      //     //   .then(function(data) {
      //     //     UserData.set(data.data);
      //     //     $redirect.redirectAfterLogin();
      //     //   }, function(responseError) {
      //     //     UserData.set(null);
      //     //     OAuthToken.removeToken();
      //     //     $ionicPopup.alert({
      //     //       title: 'Advertência',
      //     //       template: 'Login e/ou senha inválidos'
      //     //     });
      //     //   // console.log(responseError);
      //     //   });
      //   };

      $scope.updatePassword = function() {
        //
      };
    }
  ]);
