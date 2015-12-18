'use strict';

angular.module('starter.controllers')
    .controller('ClientCheckoutController', [
        '$scope', 'OAuth', '$state', '$ionicPopup',
        function ($scope, OAuth, $state, $ionicPopup) {
            $scope.user = {
                username: '',
                password: ''
            };

            $scope.login = function () {
                OAuth.getAccessToken($scope.user).then(function (data) {
                    $state.go('home');
                }, function (responseError) {
                    $ionicPopup.alert({
                        title: 'Advertência',
                        template: 'Login e/ou senha inválidos'
                    });
                    console.debug(responseError);
                });
            }
        }
    ]);
