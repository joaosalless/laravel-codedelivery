angular.module('starter.controllers')
    .controller('LoginController', [
        '$scope', 'OAuth', '$state', '$ionicPopup', '$q',
        function ($scope, OAuth, $state, $ionicPopup, $q) {
            'use strict';
            $scope.user = {
                username: '',
                password: ''
            };

            function adiarExecucao() {
                var deffered = $q.defer();
                setTimeout(function(){
                    deffered.resolve({name: 'ionic'});
                });
                return deffered.promise;
            }

            var promise = adiarExecucao()

            $scope.login = function () {
                OAuth.getAccessToken($scope.user).then(function (data) {
                    promise.then(function(data){
                        console.log(data);
                    }, function (dataError){
                        console.log(data);
                    });
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
