angular.module('starter.controllers')
  .controller('LogoutController', [
    '$scope', 'OAuthToken', '$state', '$ionicHistory', 'UserData',
    function($scope, OAuthToken, $state, $ionicHistory, UserData) {
      'use strict';

      OAuthToken.removeToken();
      UserData.set(null);
      $ionicHistory.clearCache();
      $ionicHistory.clearHistory();
      $ionicHistory.nextViewOptions({
        disableBack: true,
        historyRoot: true
      });
      $state.go('login');
    }
  ]);
