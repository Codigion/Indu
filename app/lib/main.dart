import 'dart:async';
import 'dart:io';
import 'package:flutter/material.dart';
import 'package:flutter_webview_pro/webview_flutter.dart';
import 'package:flutter/services.dart';
import 'package:url_launcher/url_launcher.dart';
import 'package:permission_handler/permission_handler.dart';
import 'package:connectivity_plus/connectivity_plus.dart';

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

  @override
  void initState() {
    super.initState();
    if (Platform.isAndroid) WebView.platform = AndroidWebView();

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
                  onWebViewCreated:
                      (WebViewController webViewController) async {
                    _controller.complete(webViewController);
                    _injectCookies(); // Inject cookies as soon as the WebView is created
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
                    _injectCookies(); // Inject cookies when the page starts loading
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

  void _injectCookies() async {
    final controller = await _controller.future;

    // Use your actual cookie names and values here
    const cookieName = 'cid';
    const cookieValue = 'cid';
    const cookieCID = 'cid';

    String script = """
      document.cookie = '$cookieName=$cookieValue; path=/';
      document.cookie = '$cookieCID=value; path=/';
    """;

    controller.runJavascript(script);
  }

  void _retrieveCookies() async {
    final controller = await _controller.future;
    String script = "document.cookie";
    String cookies = await controller.runJavascriptReturningResult(script);
    debugPrint('Retrieved Cookies: $cookies');
  }
}
