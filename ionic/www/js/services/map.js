angular.module('starter.services')
    .factory('$map', [function () {
        'use strict';
        return {
            center: {
                latitude: 0,
                longitude: 0
            },
            zoom: 12
        };
    }]);
