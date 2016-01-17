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
    'ngResource',
    'ngCordova'
])
    .constant('appConfig', {
        baseUrl: 'http://192.168.1.105'
    })
    .run(function ($ionicPlatform, $http, OAuthToken) {
        'use strict';
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

    .config(function ($stateProvider, $urlRouterProvider, OAuthProvider, OAuthTokenProvider, appConfig, $provide) {
        'use strict';
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
            .state('menu', {
                url: '/menu',
                templateUrl: 'templates/menu.html',
                controller: function ($scope, $ionicSideMenuDelegate) {
                    $scope.openLeft = function () {
                        $ionicSideMenuDelegate.toggleLeft();
                    };
                    $scope.openRight = function () {
                        $ionicSideMenuDelegate.toggleRight();
                    };
                }
            })
            .state('menu.a', {
                url: '/a',
                template: '<ion-view>' +
                        '<ion-content class="padding has-header">' +
                        '<h1>Estamos na A</h1>' +
                        '<a ui-sref="menu.b">Ir para B</a><br/>' +
                        '<a ui-sref="menu.c">Ir para C</a>' +
                        '</ion-content>' +
                        '</ion-view>',
                controller: function () {

                }
            })
            .state('menu.b', {
                url: '/b',
                template: '<ion-view>' +
                        '<ion-content class="padding has-header">' +
                        '<h1>Estamos na B</h1>' +
                        '<a ui-sref="menu.a">Ir para A</a><br/>' +
                        '<a ui-sref="menu.c">Ir para C</a>' +
                        '</ion-content>' +
                        '</ion-view>',
                controller: function () {

                }
            })
            .state('menu.c', {
                url: '/c',
                template: '<ion-view>' +
                        '<ion-content class="padding has-header">' +
                        '<h1>Estamos na C</h1>' +
                        '<a ui-sref="menu.a">Ir para A</a><br/>' +
                        '<a ui-sref="menu.b">Ir para B</a>' +
                        '</ion-content>' +
                        '</ion-view>',
                controller: function () {

                }
            })
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
                cache: false,
                url: '/checkout',
                templateUrl: 'templates/client/checkout.html',
                controller: 'ClientCheckoutController'
            })
            .state('client.checkout_item_detail', {
                url: '/checkout/detail/:index',
                templateUrl: 'templates/client/checkout_item_detail.html',
                controller: 'ClientCheckoutDetailController'
            })
            .state('client.checkout_successful', {
                cache: false,
                url: '/checkout/successfull',
                templateUrl: 'templates/client/checkout_successful.html',
                controller: 'ClientCheckoutSuccessfulController'
            })
            .state('client.view_products', {
                url: '/view_products',
                templateUrl: 'templates/client/view_products.html',
                controller: 'ClientViewProductController'
            });

        $urlRouterProvider.otherwise('/login');

        $provide.decorator('OAuthToken', ['$localStorage', '$delegate', function ($localStorage, $delegate) {
            Object.defineProperties($delegate, {
                setToken: {
                    value: function (data) {
                        return $localStorage.setObject('token', data);
                    },
                    enumerable: true,
                    configurable: true,
                    writable: true
                },
                getToken: {
                    value: function () {
                        return $localStorage.getObject('token');
                    },
                    enumerable: true,
                    configurable: true,
                    writable: true
                },
                removeToken: {
                    value: function () {
                        $localStorage.setObject('token', null);
                    },
                    enumerable: true,
                    configurable: true,
                    writable: true
                }
            });
            return $delegate;
        }]);
    });
