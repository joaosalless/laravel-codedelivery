angular.module('starter.services')
    .factory('Cupom', ['$resource', 'appConfig', function($resource, appConfig) {

        'use strict';

        return $resource(appConfig.baseUrl + '/api/cupom/:code', {code: '@code'}, {
            query: {
                isArray: false
            }
        });
    }]);
