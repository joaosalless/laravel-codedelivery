angular.module('starter.controllers')
    .controller('LoginController', [
        '$scope', 'OAuth', '$state', '$ionicPopup',
        function ($scope, OAuth, $state, $ionicPopup) {
            'use strict';
            $scope.user = {
                username: '',
                password: ''
            };

            $scope.login = function () {
                OAuth.getAccessToken($scope.user).then(function (data) {
                    $state.go('client.checkout');
                }, function (responseError) {
                    $ionicPopup.alert({
                        title: 'Advertência',
                        template: 'Login e/ou senha inválidos'
                    });
                    console.debug(responseError);
                });
            };
        }
    ]);
