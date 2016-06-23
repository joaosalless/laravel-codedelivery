angular.module('starter.services')
  .factory('User', ['$resource', 'appConfig', function($resource, appConfig) {

    'use strict';

    return $resource(appConfig.baseUrl + '/api/authenticated', {}, {
      query: {
        isArray: false
      },
      authenticated: {
        method: 'GET',
        url: appConfig.baseUrl + '/api/authenticated'
      },
      updateProfile: {
        method: 'PATCH',
        url: appConfig.baseUrl + '/api/update_profile'
      },
      updatePassword: {
        method: 'PATCH',
        url: appConfig.baseUrl + '/api/update_password'
      },
      updateDeviceToken: {
        method: 'PATCH',
        url: appConfig.baseUrl + '/api/device_token'
      }
    });
  }]);
