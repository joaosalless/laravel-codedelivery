angular.module('starter.services')
    .factory('ClientOrder', ['$resource', 'appConfig', function($resource, appConfig) {
        'use strict';
        return $resource(appConfig.baseUrl + '/api/client/orders/:id', {id: '@id'}, {
            query: {
                isArray: false
            }
        });
    }])
    .factory('DeliverymanOrder', ['$resource', 'appConfig', function($resource, appConfig) {
        'use strict';
        var url = appConfig.baseUrl + '/api/deliveryman/orders/:id';
        return $resource(url, {id: '@id'}, {
            query: {
                isArray: false
            },
            updateStatus: {
                method: 'PATCH',
                url: url + '/update-status'
            },
            geo: {
                method: 'POST',
                url: url + '/geo'
            }
        });
    }]);
