angular.module('starter.controllers', [])
  .controller('LoginController', ['$scope', 'OAuth', function ($scope, OAuth) {

    $scope.user = {
      username: '',
      password: ''
    };

    $scope.login = function () {
      OAuth.getAccessToken($scope.user).then(function(data) {
        console.log('Login funcionando');
      }, function (responseEror) {

      })
    }
  }]);
