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
            }
        });
    }]);
