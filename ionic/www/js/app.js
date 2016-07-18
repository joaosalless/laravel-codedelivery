// Ionic Starter App

// angular.module is a global place for creating, registering and retrieving Angular modules
// 'starter' is the name of this angular module example (also set in a <body> attribute in index.html)
// the 2nd parameter is an array of 'requires'

angular.module('starter.controllers', []);
angular.module('starter.services', []);
angular.module('starter.filters', []);
angular.module('starter.run', []);
angular.module('starter', [
        'ionic',
        'ionic.service.core',
        'starter.controllers',
        'starter.services',
        'starter.filters',
        'starter.run',
        'angular-oauth2',
        'ngResource',
        'ngCordova',
        'ngCordovaOauth',
        'uiGmapgoogle-maps',
        'pusher-angular',
        'ionicLazyLoad',
        'permission',
        'http-auth-interceptor'
    ])
    .constant('appConfig', {
        // baseUrl: 'https://codedelivery.dev',
        baseUrl: 'https://delivery.joaosales.com.br',
        pusherKey: '4071c7f9c5f4e6400fa0',
        redirectAfterLogin: {
            client: 'client.order',
            deliveryman: 'deliveryman.order'
        },
        name: 'JS Delivery',
        version: '0.0.1',
        organization: {
            name: 'Empresa Teste'
        }
    })
    .run(function ($ionicPlatform, $window, $interval, appConfig, $localStorage) {
        'use strict';
        $window.client = new Pusher(appConfig.pusherKey);
        $ionicPlatform.ready(function () {
            // Hide the accessory bar by default (remove this to show the accessory bar above the keyboard
            // for form inputs)
            if (window.cordova && window.cordova.plugins.Keyboard) {
                cordova.plugins.Keyboard.hideKeyboardAccessoryBar(true);
            }
            if (window.StatusBar && cordova.platformId == 'android') {
                StatusBar.backgroundColorByName('gray');
                // StatusBar.backgroundColorByHexString('#2975F4');
                StatusBar.show();
            } else if (window.StatusBar) {
                StatusBar.styleDefault();
                StatusBar.show();
            }
            Ionic.io();
            var push = new Ionic.Push({
                debug: true,
                onNotification: function (message) {
                    alert(message.text);
                },
                pluginConfig: {
                    android: {
                        iconColor: "gray"
                    }
                }
            });
            push.register(function (token) {
                $localStorage.set('device_token', token.token);
            });
        });
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
            secure: true
        }
    });

    $stateProvider
        .state('login', {
            cache: false,
            url: '/login',
            templateUrl: 'templates/login.html',
            controller: 'LoginController'
        })
        .state('logout', {
            cache: false,
            url: '/logout',
            controller: 'LogoutController'
        })
        .state('client', {
            abstract: true,
            cache: false,
            url: '/client',
            templateUrl: 'templates/client/menu.html',
            controller: 'ClientMenuController',
            data: {
                permissions: {
                    only: ['client-role']
                }
            }
        })
        .state('client.settings', {
            cache: false,
            url: '/settings',
            templateUrl: 'templates/client/settings/settings.html',
            controller: 'ClientSettingsController'
        })
        .state('client.settings_password', {
            cache: false,
            url: '/settings_password',
            templateUrl: 'templates/settings/password.html',
            controller: 'PasswordController'
        })
        .state('client.settings_touchid', {
            cache: false,
            url: '/settings_touchid',
            templateUrl: 'templates/settings/touchid.html',
            controller: 'TouchIDController'
        })
        .state('client.settings_profile', {
            cache: false,
            url: '/settings_profile',
            templateUrl: 'templates/client/settings/profile.html',
            controller: 'ClientSettingsProfileController'
        })
        .state('client.settings_addresses', {
            cache: false,
            url: '/settings_addresses',
            templateUrl: 'templates/client/settings/addresses.html',
            controller: 'ClientSettingsProfileController'
        })
        .state('client.order', {
            cache: false,
            url: '/order',
            templateUrl: 'templates/client/order.html',
            controller: 'ClientOrderController'
        })
        .state('client.view_order', {
            cache: false,
            url: '/view_order/:id',
            templateUrl: 'templates/client/view_order.html',
            controller: 'ClientViewOrderController'
        })
        .state('client.view_delivery', {
            cache: false,
            url: '/view_delivery/:id',
            templateUrl: 'templates/client/view_delivery.html',
            controller: 'ClientViewDeliveryController'
        })
        .state('client.checkout', {
            cache: false,
            url: '/checkout',
            templateUrl: 'templates/client/checkout.html',
            controller: 'ClientCheckoutController'
        })
        .state('client.checkout_item_detail', {
            cache: false,
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
        .state('client.product_index', {
            cache: false,
            url: '/product_index',
            templateUrl: 'templates/client/product/index.html',
            controller: 'ClientProductIndexController'
        })
        .state('client.product_show', {
            cache: false,
            url: '/product/:id',
            templateUrl: 'templates/client/product/show.html',
            controller: 'ClientProductShowController'
        })
        .state('deliveryman', {
            abstract: true,
            cache: false,
            url: '/deliveryman',
            templateUrl: 'templates/deliveryman/menu.html',
            controller: 'DeliverymanMenuController',
            data: {
                permissions: {
                    only: ['deliveryman-role']
                }
            }
        })
        .state('deliveryman.touchid', {
            url: '/touchid',
            templateUrl: 'templates/settings/touchid.html',
            controller: 'TouchIDController'
        })
        .state('deliveryman.settings', {
            url: '/settings',
            templateUrl: 'templates/deliveryman/settings.html',
            controller: 'DeliverymanSettingsController'
        })
        .state('deliveryman.order', {
            url: '/order',
            templateUrl: 'templates/deliveryman/order.html',
            controller: 'DeliverymanOrderController'
        })
        .state('deliveryman.view_order', {
            cache: false,
            url: '/view_order/:id',
            templateUrl: 'templates/deliveryman/view_order.html',
            controller: 'DeliverymanViewOrderController'
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

    $provide.decorator('oauthInterceptor', ['$delegate', function ($delegate) {
        delete $delegate['responseError'];
        return $delegate;
    }]);
});
