angular.module('starter.controllers', [])
  .controller('HomeController', function($scope, $state, $stateParams) {
    $scope.state = $state.current;
    $scope.nome = $stateParams.nome;
  })
