#!/bin/bash

cordova build --release android

# keytool -genkey -v -keystore my-keystore.keystore -alias js_delivery -keyalg RSA -keysize 2048 -validity 10000

jarsigner -verbose -sigalg SHA1withRSA -digestalg SHA1 -keystore my-keystore.keystore platforms/android/build/outputs/apk/android-release-unsigned.apk js_delivery

$ANDROID_HOME/build-tools/22.0.1/zipalign -f -v 4 platforms/android/build/outputs/apk/android-release-unsigned.apk JsDelivery.apk
