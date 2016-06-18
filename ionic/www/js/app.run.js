angular
  .module('starter.run')
  .run([
    'PermissionStore', 'RoleStore', 'OAuth', 'UserData',
    function(PermissionStore, RoleStore, OAuth, UserData) {
      'use strict';

      PermissionStore.definePermission('user-permission', function(stateParam) {
        return OAuth.isAuthenticated();
      });

      PermissionStore.definePermission('client-permission', function() {
        var user = UserData.get();

        if (user === null || !user.hasOwnProperty('role')) {
          return false;
        }
        return user.role === 'client';
      });

      RoleStore.defineRole('client-role', [
        'user-permission',
        'client-permission',
      ]);

    }]);
