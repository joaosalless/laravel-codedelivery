angular.module('starter.controllers')
    .controller('ClientMenuController', [
        '$scope', 'UserData',
        function ($scope, UserData) {
            'use strict';
            $scope.user = UserData.get();
        }
    ]);
