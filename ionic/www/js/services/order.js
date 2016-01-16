angular.module('starter.services')
    .factory('Order', ['$resource', 'appConfig', function($resource, appConfig) {

        'use strict';

        return $resource(appConfig.baseUrl + '/api/client/orders/:id', {id: '@id'}, {
            query: {
                isArray: false
            }
        });
    }]);
