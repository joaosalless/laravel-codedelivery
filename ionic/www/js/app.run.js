angular
  .module('starter.run')
  .run(['PermissionStore', 'OAuth', function(PermissionStore, OAuth) {
    'use strict';

    PermissionStore.definePermission('user-permission', function() {
      return OAuth.isAuthenticated();
    });

  }]);
