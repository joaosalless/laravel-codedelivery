// Ionic Starter App

// angular.module is a global place for creating, registering and retrieving Angular modules
// 'starter' is the name of this angular module example (also set in a <body> attribute in index.html)
// the 2nd parameter is an array of 'requires'

angular.module('starter.controllers', []);
angular.module('starter.services', []);

angular.module('starter', [
    'ionic',
    'starter.controllers',
    'starter.services',
    'angular-oauth2',
    'ngResource'
])
.constant('appConfig', {
  baseUrl: 'http://codedelivery.dev'
})
.run(function ($ionicPlatform, $http, OAuthToken) {
    $ionicPlatform.ready(function () {
        // Hide the accessory bar by default (remove this to show the accessory bar above the keyboard
        // for form inputs)
        if (window.cordova && window.cordova.plugins.Keyboard) {
            cordova.plugins.Keyboard.hideKeyboardAccessoryBar(true);
        }
        if (window.StatusBar) {
            StatusBar.styleDefault();
        }
    });

    $http.defaults.headers.common.Authorization = 'Bearer ' + OAuthToken.getToken();
})

.config(function ($stateProvider, $urlRouterProvider, OAuthProvider, OAuthTokenProvider, appConfig) {
    OAuthProvider.configure({
        baseUrl: appConfig.baseUrl,
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
                    function (success) {
                        $scope.user = success.data;
                        // console.log($scope.user);
                    },
                    function (error) {
                        console.log(error);
                    }
                );
            }
        })
        .state('client', {
            abstract: true,
            url: '/client',
            template: '<ion-nav-view/>'
        })
        .state('client.checkout', {
            url: '/checkout',
            templateUrl: 'templates/client/checkout.html',
            controller: 'ClientCheckoutController'
        })
        .state('client.checkout_item_detail', {
            url: '/checkout/detail/:index',
            templateUrl: 'templates/client/checkout_item_detail.html',
            controller: 'ClientCheckoutDetailController'
        })
        .state('client.view_products', {
            url: '/view_products',
            templateUrl: 'templates/client/view_products.html',
            controller: 'ClientViewProductController'
        })
    // $urlRouterProvider.otherwise('/');
})
.service('cart', function () {
    this.items = [];
});
