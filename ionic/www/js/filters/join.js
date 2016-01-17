angular.module('starter.filters')
    .filter('join', function () {
        'use strict';
        return function (input, joinStr) {
            return input.join(joinStr);
        };
    });
