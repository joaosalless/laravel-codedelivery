angular.module('starter.controllers')
    .controller('LoginController', [
        '$scope', 'OAuth', 'OAuthToken', '$state', '$ionicPopup', '$localStorage', 'User',
        function ($scope, OAuth, OAuthToken, $state, $ionicPopup, $localStorage, User) {
            'use strict';

            $scope.user = {
                username: '',
                password: ''
            };

            $scope.login = function () {
                var promise = OAuth.getAccessToken($scope.user);
                promise
                    .then(function (data) {
                        return User.authenticated({include: 'client'}).$promise;
                    })
                    .then(function (data) {
                        console.log(data.data);
                        $localStorage.setObject('user', data.data);
                        $state.go('client.checkout');
                    }, function (responseError) {
                        $localStorage.setObject('user', null);
                        OAuthToken.removeToken();
                        $ionicPopup.alert({
                            title: 'Advertência',
                            template: 'Login e/ou senha inválidos'
                        });
                        console.log(responseError);
                    });
            };
        }
    ]);
