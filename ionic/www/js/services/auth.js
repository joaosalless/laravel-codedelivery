angular.module('starter.services')
  .service('$auth', [
    'OAuth', 'OAuthToken', 'User', 'UserData', '$localStorage', '$ionicHistory', '$ionicPopup', '$redirect',
    function(OAuth, OAuthToken, User, UserData, $localStorage, $ionicHistory, $ionicPopup, $redirect) {
      'use strict';

      this.login = function(username, password) {
        var promise = OAuth.getAccessToken({
          username: username,
          password: password
        });
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
          // console.log(responseError);
          });
      };
      this.logout = function() {
        OAuthToken.removeToken();
        UserData.set(null);
        $ionicHistory.clearCache();
        $ionicHistory.clearHistory();
        $ionicHistory.nextViewOptions({
          disableBack: true,
          historyRoot: true
        });
      };
    }]);
