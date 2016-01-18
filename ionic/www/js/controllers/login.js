angular.module('starter.controllers')
    .controller('LoginController', [
        '$scope', 'OAuth', 'OAuthToken', '$state', '$ionicPopup', 'UserData', 'User',
        function ($scope, OAuth, OAuthToken, $state, $ionicPopup, UserData, User) {
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
                        UserData.set(data.data);
                        $state.go('client.checkout');
                    }, function (responseError) {
                        UserData.set(null);
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
