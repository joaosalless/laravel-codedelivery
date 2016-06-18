angular.module('starter.services')
  .service('$redirect', ['$state', 'UserData', 'appConfig',
    function($state, UserData, appConfig) {
      'use strict';

      this.redirectAfterLogin = function() {
        var user = UserData.get();
        $state.go(appConfig.redirectAfterLogin[user.role]);
      };
    }]);
