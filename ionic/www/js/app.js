// Ionic Starter App

// angular.module is a global place for creating, registering and retrieving Angular modules
// 'starter' is the name of this angular module example (also set in a <body> attribute in index.html)
// the 2nd parameter is an array of 'requires'
angular.module('starter', [
  'ionic',
  'starter.controllers',
  'angular-oauth2'
])

.run(function($ionicPlatform, $http, OAuthToken) {
  $ionicPlatform.ready(function() {
    // Hide the accessory bar by default (remove this to show the accessory bar above the keyboard
    // for form inputs)
    if(window.cordova && window.cordova.plugins.Keyboard) {
      cordova.plugins.Keyboard.hideKeyboardAccessoryBar(true);
    }
    if(window.StatusBar) {
      StatusBar.styleDefault();
    }
  });

  $http.defaults.headers.common.Authorization = 'Bearer ' + OAuthToken.getToken();
})

.config(function ($stateProvider, $urlRouterProvider, OAuthProvider, OAuthTokenProvider) {
  OAuthProvider.configure({
    baseUrl: 'http://codedelivery.dev',
    clientId: 'appid01',
    clientSecret: 'secret', // optional
    grantPath: '/oauth/access_token'
  });

  OAuthTokenProvider.configure({
    name: 'token',
    options: {
      secure: false
    }
  });

  $stateProvider
    .state('login', {
      url: '/login',
      templateUrl: 'templates/login.html',
      controller: 'LoginController'
    })
    .state('home', {
      url: '/home',
      templateUrl: 'templates/home.html',
      controller: function ($scope, $http) {
        $http.get('http://codedelivery.dev/api/authenticated?include=client').then(
          function(success){
            $scope.user = success.data;
            // console.log($scope.user);
          }, function(error){
            console.log(error);
          }
        );
      }
    })

  // $urlRouterProvider.otherwise('/');
});
