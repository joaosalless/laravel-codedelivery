angular.module('starter.services')
    .factory('Product', ['$resource', 'appConfig', function($resource, appConfig) {

        'use strict';

        return $resource(appConfig.baseUrl + '/api/client/products', {}, {
            query: {
                isArray: false
            }
        });
    }])
