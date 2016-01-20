angular.module('starter.controllers')
    .controller('ClientMenuController', [
        '$scope', 'appConfig', 'UserData',
        function ($scope, appConfig, UserData) {
            'use strict';
            $scope.app  = appConfig;
            $scope.user = UserData.get();
        }
    ]);
