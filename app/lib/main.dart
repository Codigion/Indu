import 'dart:async';
import 'dart:io';
import 'package:flutter/material.dart';
import 'package:flutter_webview_pro/webview_flutter.dart';
import 'package:flutter/services.dart';
import 'package:url_launcher/url_launcher.dart';
import 'package:permission_handler/permission_handler.dart';
import 'package:connectivity_plus/connectivity_plus.dart';
import 'dart:convert';
import 'package:http/http.dart' as http;

void main() {
  WidgetsFlutterBinding.ensureInitialized();
  runApp(MyApp());
}

class MyApp extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      debugShowCheckedModeBanner: false,
      home: SplashLoadingScreen(), // Start with the SplashLoadingScreen
    );
  }
}

class PermissionRequestScreen extends StatefulWidget {
  @override
  _PermissionRequestScreenState createState() =>
      _PermissionRequestScreenState();
}

class _PermissionRequestScreenState extends State<PermissionRequestScreen>
    with WidgetsBindingObserver {
  @override
  void initState() {
    super.initState();
    WidgetsBinding.instance
        .addObserver(this); // Add an observer to the lifecycle events
    _checkAndRequestPermission(); // Initial check
  }

  @override
  void dispose() {
    WidgetsBinding.instance.removeObserver(this); // Clean up the observer
    super.dispose();
  }

  @override
  void didChangeAppLifecycleState(AppLifecycleState state) {
    super.didChangeAppLifecycleState(state);
    if (state == AppLifecycleState.resumed) {
      _checkAndRequestPermission(); // Check permission again when app is resumed
    }
  }

  Future<void> _checkAndRequestPermission() async {
    var status = await Permission.camera.status;
    if (status.isDenied) {
      // Request permission if it is denied
      await Permission.camera.request();
      _redirectIfPermissionGranted();
    } else if (status.isGranted) {
      _redirectIfPermissionGranted();
    } // If permission is permanently denied, you might want to handle it differently
  }

  void _redirectIfPermissionGranted() async {
    if (await Permission.camera.isGranted) {
      Navigator.of(context).pushReplacement(MaterialPageRoute(
          builder: (context) =>
              MainAppScreen())); // Go to the main screen if permission is granted
    } else {
      setState(() {}); // Trigger a rebuild to show the permission request UI
    }
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      body: Center(
        child: Column(
          mainAxisAlignment: MainAxisAlignment.center,
          children: <Widget>[
            Text("Camera permission is required to use this app.",
                style: TextStyle(fontSize: 18)),
            SizedBox(height: 20),
            ElevatedButton(
              onPressed: () => openAppSettings(),
              child: Text('Open App Settings'),
            ),
          ],
        ),
      ),
    );
  }
}

class MainAppScreen extends StatefulWidget {
  @override
  _MainAppScreenState createState() => _MainAppScreenState();
}

class _MainAppScreenState extends State<MainAppScreen> {
  final Completer<WebViewController> _controller =
      Completer<WebViewController>();
  bool _isOffline = false;
  bool _cookiesInjected = false;

  @override
  void initState() {
    super.initState();
    if (Platform.isAndroid) WebView.platform = SurfaceAndroidWebView();

    Connectivity().onConnectivityChanged.listen((ConnectivityResult result) {
      setState(() {
        _isOffline = result == ConnectivityResult.none;
      });
    });
  }

  @override
  Widget build(BuildContext context) {
    SystemChrome.setPreferredOrientations([
      DeviceOrientation.portraitUp,
    ]);

    return Scaffold(
      body: SafeArea(
        child: _isOffline
            ? _buildNoInternetWidget()
            : WebView(
                initialUrl: 'https://biometriccowidentification-ndri.in/',
                javascriptMode: JavascriptMode.unrestricted,
                onWebViewCreated: (WebViewController webViewController) async {
                  _controller.complete(webViewController);
                  if (!_cookiesInjected) {
                    bool cookieExists = await _checkCookieExists('cid');
                    if (!cookieExists) {
                      await _injectCookies();
                      setState(() {
                        _cookiesInjected = true;
                      });
                    }
                  }
                },
                javascriptChannels: <JavascriptChannel>{
                  _toasterJavascriptChannel(context),
                },
                navigationDelegate: (NavigationRequest request) async {
                  if (request.url ==
                      "https://biometriccowidentification-ndri.in//SignOutUser") {
                    await _removeAllCookies();
                    return NavigationDecision.navigate;
                  } else if (!request.url.startsWith(
                      "https://biometriccowidentification-ndri.in/")) {
                    await launchExternalURL(request.url);
                    return NavigationDecision.prevent;
                  }
                  return NavigationDecision.navigate;
                },
                onPageFinished: (String url) {
                  _retrieveCookies();
                },
                gestureNavigationEnabled: true,
                geolocationEnabled: false,
              ),
      ),
    );
  }

  Widget _buildNoInternetWidget() {
    return Center(
      child: Column(
        mainAxisAlignment: MainAxisAlignment.center,
        children: [
          Icon(Icons.wifi_off, size: 80, color: Colors.grey),
          SizedBox(height: 20),
          Text('No Internet Connection', style: TextStyle(fontSize: 18)),
          SizedBox(height: 20),
          ElevatedButton(
            onPressed: () {
              setState(() {
                _isOffline = false;
              });
            },
            child: Text('Retry'),
          ),
        ],
      ),
    );
  }

  Future<void> launchExternalURL(String url) async {
    if (url.startsWith('tel:') || url.startsWith('mailto:')) {
      await launch(url);
    } else if (await canLaunch(url)) {
      await launch(url);
    } else {
      throw 'Could not launch $url';
    }
  }

  JavascriptChannel _toasterJavascriptChannel(BuildContext context) {
    return JavascriptChannel(
      name: 'Toaster',
      onMessageReceived: (JavascriptMessage message) {
        ScaffoldMessenger.of(context).showSnackBar(
          SnackBar(content: Text(message.message)),
        );
      },
    );
  }

  Future<bool> _checkCookieExists(String cookieName) async {
    final controller = await _controller.future;
    String cookies =
        await controller.runJavascriptReturningResult("document.cookie");
    return cookies.contains('$cookieName=');
  }

  Future<void> _injectCookies() async {
    final controller = await _controller.future;
    try {
      var url = Uri.parse('https://biometriccowidentification-ndri.in/IsApp');
      var response = await http.get(url);
      if (response.statusCode == 200) {
        var data = json.decode(response.body);
        String cookieName = data['CookieName'];
        String cookieValue = data['CookieValue'].toString();
        String expires = "expires=Fri, 31 Dec 9999 23:59:59 GMT;";
        await controller.runJavascript(
            "document.cookie = '$cookieName=$cookieValue; $expires path=/;';");
      } else {
        debugPrint('Failed to load data: ${response.statusCode}');
      }
    } catch (e) {
      debugPrint('Error fetching data: $e');
    }
  }

  void _retrieveCookies() async {
    final controller = await _controller.future;
    String cookies =
        await controller.runJavascriptReturningResult("document.cookie");
    debugPrint('Retrieved Cookies: $cookies');
  }

  Future<void> _removeAllCookies() async {
    final controller = await _controller.future;
    await controller.runJavascript("""
      var cookies = document.cookie.split("; ");
      for (var i = 0; i < cookies.length; i++) {
          var cookie = cookies[i];
          var eqPos = cookie.indexOf("=");
          var name = eqPos > -1 ? cookie.substring(0, eqPos) : cookie;
          document.cookie = name + '=; expires=Thu, 01 Jan 1970 00:00:00 GMT; path=/;';
      }
    """);
    debugPrint('All cookies removed');
  }
}

class SplashLoadingScreen extends StatefulWidget {
  @override
  _SplashLoadingScreenState createState() => _SplashLoadingScreenState();
}

class _SplashLoadingScreenState extends State<SplashLoadingScreen> {
  @override
  void initState() {
    super.initState();
    Future.delayed(Duration(seconds: 3), () {
      Navigator.of(context).pushReplacement(MaterialPageRoute(
        builder: (context) => PermissionRequestScreen(),
      ));
    });
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      body: Center(
        child: Column(
          mainAxisAlignment: MainAxisAlignment.center,
          children: <Widget>[
            Image.asset('assets/logo.png', width: 120), // Your logo here
            SizedBox(height: 24),
            Text('Biometric Cow Identification',
                style: TextStyle(fontSize: 18)),
            Text('NDRI', style: TextStyle(fontSize: 12)),
          ],
        ),
      ),
    );
  }
}
