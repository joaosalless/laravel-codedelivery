angular.module('starter.controllers')
  .controller('ClientSettingsProfileController', [
    '$scope', '$state', 'appConfig', 'UserData', 'User', '$ionicActionSheet', '$ionicLoading', '$cordovaCamera',
    function($scope, $state, appConfig, UserData, User, $ionicActionSheet, $ionicLoading, $cordovaCamera) {
      'use strict';
      $scope.app = appConfig;
      $scope.user = UserData.get();
      $scope.isChanged = false;

      $scope.updateProfile = function() {
        $ionicLoading.show({
          template: '<ion-spinner class="spinner-light"></ion-spinner>'
        });
        User.updateProfile({
          id: null
        }, $scope.user, function() {
          User.authenticated({
            include: 'client'
          }, function(data) {
            UserData.set(data.data);
            $scope.user = UserData.get();
            $ionicLoading.hide();
            $state.go('client.settings');
          });
        });
      };

      $scope.updatePassword = function() {
        //
      };

      $scope.changePhoto = function() {
        $ionicActionSheet.show({
          buttons: [
            {
              text: 'Tirar Foto'
            },
            {
              text: 'Escolher Foto da Galeria'
            },
            {
              text: 'Remover Foto'
            },
          ],
          cancelText: 'Cancelar',
          cancel: function() {
            // console.log('cancel button pressed.');
          },
          buttonClicked: function(index) {
            switch (index) {
              case 0:
                $scope.takePhoto();
                break;
              case 1:
                $scope.choosePhoto();
                break;
              case 2:
                $scope.removePhoto();
                break;
            }
          }
        });
      };

      $scope.takePhoto = function() {
        var options = {
          quality: 75,
          destinationType: Camera.DestinationType.DATA_URL,
          sourceType: Camera.PictureSourceType.CAMERA,
          allowEdit: true,
          encodingType: Camera.EncodingType.PNG,
          targetWidth: 600,
          targetHeight: 600,
          popoverOptions: CameraPopoverOptions,
          saveToPhotoAlbum: false
        };

        $cordovaCamera.getPicture(options).then(function(imageData) {
          $scope.user.image = "data:image/png;base64," + imageData;
        }, function(err) {
          // An error occured. Show a message to the user
        });
      };

      $scope.choosePhoto = function() {
        var options = {
          quality: 75,
          destinationType: Camera.DestinationType.DATA_URL,
          sourceType: Camera.PictureSourceType.PHOTOLIBRARY,
          allowEdit: true,
          encodingType: Camera.EncodingType.PNG,
          targetWidth: 600,
          targetHeight: 600,
          popoverOptions: CameraPopoverOptions,
          saveToPhotoAlbum: false
        };

        $cordovaCamera.getPicture(options).then(function(imageData) {
          $scope.user.image = "data:image/png;base64," + imageData;
        }, function(err) {
          // An error occured. Show a message to the user
        });
      };

      $scope.removePhoto = function() {
        //
      };
    }
  ]);
