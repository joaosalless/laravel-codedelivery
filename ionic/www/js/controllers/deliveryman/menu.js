angular.module('starter.controllers')
    .controller('DeliverymanMenuController', [
        '$scope', 'UserData',
        function ($scope, UserData) {
            'use strict';
            $scope.user = UserData.get();
        }
    ]);
