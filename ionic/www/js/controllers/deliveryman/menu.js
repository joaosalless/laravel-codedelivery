angular.module('starter.controllers')
    .controller('DeliverymanMenuController', [
        '$scope', 'User', '$ionicLoading',
        function ($scope, User, $ionicLoading) {

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