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

void main() async {
  WidgetsFlutterBinding.ensureInitialized();

  final status = await Permission.camera.request();

  if (status.isGranted) {
    runApp(const MyApp());
  } else {
    // Handle permission denied
    SystemNavigator.pop();
  }
}

class MyApp extends StatefulWidget {
  const MyApp({Key? key}) : super(key: key);

  @override
  State<MyApp> createState() => _MyAppState();
}

class _MyAppState extends State<MyApp> {
  final Completer<WebViewController> _controller =
      Completer<WebViewController>();
  bool _isOffline = false;
  bool _cookiesInjected = false; // Flag to track cookie injection

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

    return MaterialApp(
      debugShowCheckedModeBanner: false,
      home: Scaffold(
        body: SafeArea(
          child: _isOffline
              ? _buildNoInternetWidget()
              : WebView(
                  initialUrl: 'https://cow-identifier.codigion.com/',
                  javascriptMode: JavascriptMode.unrestricted,
                  onWebViewCreated: (WebViewController webViewController) async {
                    _controller.complete(webViewController);
                    // Check cookies and inject if necessary
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
                  onProgress: (int progress) {
                    // Handle progress
                  },
                  javascriptChannels: <JavascriptChannel>{
                    _toasterJavascriptChannel(context),
                  },
                  navigationDelegate: (NavigationRequest request) async {
                    if (!request.url
                        .startsWith("https://cow-identifier.codigion.com/")) {
                      await launchExternalURL(request.url);
                      return NavigationDecision.prevent;
                    }
                    return NavigationDecision.navigate;
                  },
                  onPageStarted: (String url) {
                    // Optionally handle page started
                  },
                  onPageFinished: (String url) {
                    _retrieveCookies(); // Retrieve cookies when the page finishes loading
                  },
                  onWebResourceError: (WebResourceError error) {
                    debugPrint(
                        'Error Code: ${error.errorCode}, Description: ${error.description}');
                  },
                  gestureNavigationEnabled: true,
                  geolocationEnabled: false,
                ),
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
          const SizedBox(height: 20),
          const Text('No Internet Connection', style: TextStyle(fontSize: 18)),
          const SizedBox(height: 20),
          ElevatedButton(
            onPressed: () {
              setState(() {
                _isOffline = false;
              });
            },
            child: const Text('Retry'),
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
    String script = "document.cookie";
    String cookies = await controller.runJavascriptReturningResult(script);
    // Check if the specific cookie is present
    return cookies.contains('$cookieName=');
  }

  Future<void> _injectCookies() async {
    final controller = await _controller.future;
    try {
      var url = Uri.parse(
          'https://cow-identifier.codigion.com/IsApp'); // Adjust URL as needed
      var response = await http.get(url);
      if (response.statusCode == 200) {
        var data = json.decode(response.body); // Parse the JSON response
        debugPrint(data.toString());

        // Assuming 'CookieName', 'CookieValue', and optionally 'expires' are fields in your JSON response
        String cookieName = data['CookieName'];
        String cookieValue = data['CookieValue'].toString();
        String expires = "expires=Fri, 31 Dec 9999 23:59:59 GMT;";

        String script = """
  document.cookie = '$cookieName=$cookieValue; $expires path=/;';
  """;

        await controller.runJavascript(script);
        debugPrint('Cookies injected successfully');
      } else {
        debugPrint('Failed to load data: ${response.statusCode}');
      }
    } catch (e) {
      debugPrint('Error fetching data: $e');
    }
  }

  void _retrieveCookies() async {
    final controller = await _controller.future;
    String script = "document.cookie";
    String cookies = await controller.runJavascriptReturningResult(script);
    debugPrint('Retrieved Cookies: $cookies');
  }
}
