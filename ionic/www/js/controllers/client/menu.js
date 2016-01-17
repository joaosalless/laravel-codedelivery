angular.module('starter.controllers')
    .controller('ClientMenuController', [
        '$scope', '$state', 'User', '$ionicLoading',
        function ($scope, $state, User, $ionicLoading) {

            'use strict';

            $scope.user = {
                name: ''
            };

            $ionicLoading.show({
                template: 'Carregando...'
            });

            User.authenticated({}, function (data) {
                $scope.user = data.data;
                $ionicLoading.hide();
            }, function (responseError) {
                $ionicLoading.hide();
            });
        }
    ]);
