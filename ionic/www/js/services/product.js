angular.module('starter.services')
  .factory('Product', ['$resource', 'appConfig', function($resource, appConfig) {
    'use strict';
    return $resource(appConfig.baseUrl + '/api/client/products/:id', {
      id: '@id'
    }, {
      query: {
        isArray: false
      }
    });
  }]);
