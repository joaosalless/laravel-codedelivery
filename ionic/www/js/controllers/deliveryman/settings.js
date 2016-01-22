angular.module('starter.controllers')
    .controller('DeliverymanSettingsController', [
        '$scope', 'appConfig', 'UserData',
        function ($scope, appConfig, UserData) {
            'use strict';
            $scope.app  = appConfig;
            $scope.user = UserData.get();
            $scope.user.config = {
                teste: true,
                teste2: false
            };
        }
    ]);
