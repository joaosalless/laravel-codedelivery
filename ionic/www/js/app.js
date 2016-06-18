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
  'uiGmapgoogle-maps',
  'pusher-angular',
  'ionicLazyLoad',
  'permission',
  'http-auth-interceptor'
])
  .constant('appConfig', {
    // baseUrl: 'https://delivery.joaosales.com.br',
    baseUrl: 'http://codedelivery.dev',
    pusherKey: '4071c7f9c5f4e6400fa0',
    redirectAfterLogin: {
      client: 'client.order',
      deliveryman: 'deliveryman.order'
    },
    name: 'Delivery',
    version: '0.0.1',
    organization: {
      name: 'Empresa Teste'
    }
  })
  .run(function($ionicPlatform, $window, appConfig, $localStorage) {
    'use strict';
    $window.client = new Pusher(appConfig.pusherKey);
    $ionicPlatform.ready(function() {
      // Hide the accessory bar by default (remove this to show the accessory bar above the keyboard
      // for form inputs)
      if (window.cordova && window.cordova.plugins.Keyboard) {
        cordova.plugins.Keyboard.hideKeyboardAccessoryBar(true);
      }
      if (window.StatusBar && cordova.platformId == 'android') {
        // StatusBar.backgroundColorByName('gray');
        StatusBar.backgroundColorByHexString('#2975F4');
        StatusBar.show();
      } else if (window.StatusBar) {
        StatusBar.styleDefault();
        StatusBar.show();
      }
      Ionic.io();
      var push = new Ionic.Push({
        debug: true,
        onNotification: function(message) {
          alert(message.text);
        },
        pluginConfig: {
          android: {
            iconColor: "gray"
          }
        }
      });
      push.register(function(token) {
        $localStorage.set('device_token', token.token);
      });
    });
  })

  .config(function($stateProvider, $urlRouterProvider, OAuthProvider, OAuthTokenProvider, appConfig, $provide) {
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
        url: '/settings',
        templateUrl: 'templates/client/settings.html',
        controller: 'ClientSettingsController'
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
      .state('client.view_products', {
        url: '/view_products',
        templateUrl: 'templates/client/view_products.html',
        controller: 'ClientViewProductController'
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

    $provide.decorator('OAuthToken', ['$localStorage', '$delegate', function($localStorage, $delegate) {
      Object.defineProperties($delegate, {
        setToken: {
          value: function(data) {
            return $localStorage.setObject('token', data);
          },
          enumerable: true,
          configurable: true,
          writable: true
        },
        getToken: {
          value: function() {
            return $localStorage.getObject('token');
          },
          enumerable: true,
          configurable: true,
          writable: true
        },
        removeToken: {
          value: function() {
            $localStorage.setObject('token', null);
          },
          enumerable: true,
          configurable: true,
          writable: true
        }
      });
      return $delegate;
    }]);

    $provide.decorator('oauthInterceptor', ['$delegate', function($delegate) {
      delete $delegate['responseError'];
      return $delegate;
    }]);
  });
