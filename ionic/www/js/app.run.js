angular
  .module('starter.run')
  .run([
    '$state', 'PermissionStore', 'RoleStore', 'OAuth', 'UserData', '$rootScope', 'authService',
    function($state, PermissionStore, RoleStore, OAuth, UserData, $rootScope, authService) {
      'use strict';

      PermissionStore.definePermission('user-permission', function(stateParam) {
        return OAuth.isAuthenticated();
      });

      /*
       * Permissões de Cliente
       */
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

      /*
       * Permissões de Deliveryman
       */
      PermissionStore.definePermission('deliveryman-permission', function() {
        var user = UserData.get();

        if (user === null || !user.hasOwnProperty('role')) {
          return false;
        }
        return user.role === 'deliveryman';
      });

      RoleStore.defineRole('deliveryman-role', [
        'user-permission',
        'deliveryman-permission',
      ]);


      $rootScope.$on('event:auth-loginRequired', function(event, data) {
        if (!$rootScope.refreshingToken) {
          $rootScope.refreshingToken = OAuth.getRefreshToken();
        }
        OAuth.getRefreshToken().then(
          function(data) {
            authService.loginConfirmed();
            $rootScope.refreshingToken = null;
          },
          function(responseError) {
            $state.go('logout');
          }
        );
      });

    }]);
