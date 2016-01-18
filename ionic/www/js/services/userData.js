angular.module('starter.services')
    .factory('UserData', ['$localStorage', function ($localStorage) {

        'use strict';

        var key = 'user';

        return {
            set: function (value) {
                return $localStorage.setObject(key, value);
            },
            get: function () {
                return $localStorage.getObject(key);
            }
        };
    }]);
