angular.module('starter.controllers')
    .controller('LoginController', [
        '$scope', 'OAuth', 'OAuthToken', '$state', '$ionicPopup', 'UserData', 'User', 'appConfig',
        function ($scope, OAuth, OAuthToken, $state, $ionicPopup, UserData, User, appConfig) {
            'use strict';

            var home;

            $scope.app  = appConfig;
            $scope.user = {
                username: 'entregador1@user.com',
                password: '123456'
            };

            $scope.login = function () {
                var promise = OAuth.getAccessToken($scope.user);
                promise
                    .then(function (data) {
                        return User.authenticated({include: 'client'}).$promise;
                    })
                    .then(function (data) {
                        UserData.set(data.data);
                        $state.go(getRedirectUrl(data.data.role));
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

            function getRedirectUrl(role) {
                return (role == 'deliveryman') ? 'deliveryman.order' : 'client.checkout';
            }
        }
    ]);
