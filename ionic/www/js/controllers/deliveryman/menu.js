angular.module('starter.controllers')
    .controller('DeliverymanMenuController', [
        '$scope', 'appConfig', 'UserData',
        function ($scope, appConfig, UserData) {
            'use strict';
            $scope.app  = appConfig;
            $scope.user = UserData.get();
        }
    ]);
