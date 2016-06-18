angular.module('starter.controllers')
  .controller('LoginController', ['$scope', '$auth', function($scope, $auth) {
    'use strict';

    $scope.user = {
      username: 'user@user.com',
      password: '123456'
    };

    $scope.login = function() {
      $auth.login($scope.user.username, $scope.user.password);
    };
  }
  ]);
