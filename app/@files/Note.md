https://stackoverflow.com/questions/55592392/how-to-fix-neterr-cleartext-not-permitted-in-flutter


In main directory of your Flutter project you have three main folders:

- lib         =  your Dart code
- ios         =  generated structure for iOS platform
- android     =  generated structure for Android platform

We are interested in android directory. When you open it, you will see "typical Android app structure".

So you have to do 2 things:
1) Add new file in res

Go to directory:

my_flutter_project/android/app/src/main/res/

Create xml directory (in res!)

And inside xml add new file with name: network_security_config.xml and content:

<?xml version="1.0" encoding="utf-8"?>
<network-security-config>
    <base-config cleartextTrafficPermitted="true">
        <trust-anchors>
            <certificates src="system" />
            <certificates src="user" />
        </trust-anchors>
    </base-config>
</network-security-config>

network_security_config.xml should be located in path:

my_flutter_project/android/app/src/main/res/xml/network_security_config.xml

network_security_config

    Here you can find more information about this file:

    https://developer.android.com/training/articles/security-config

2) Modify AndroidManifest.xml

Go to:

flutter_project/android/app/src/main/AndroidManifest.xml

enter image description here

AndroidManifest.xml is XML file, with structure:

<manifest>
    <application>
        <activity>
            ...
        </activity>
        <meta-data >
    </application>
</manifest>

So for <application> PROPERTIES you have to add 1 line:

android:networkSecurityConfig="@xml/network_security_config"

enter image description here
Remember that you have to add it as property (inside application opening tag):

<application

    SOMEWHERE HERE IS OK

>

Not as a tag:

<application>           <--- opening tag

    HERE IS WRONG!!!!

<application/>          <--- closing tag

