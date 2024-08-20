import 'dart:async';
import 'dart:io';
import 'package:flutter/material.dart';
/* Web View */
// flutter_webview_pro: ^3.0.1+4
// Supports: Android File Chooser in Web View
import 'package:flutter_webview_pro/webview_flutter.dart';
/* Screen Orientation */
import 'package:flutter/services.dart';
/* URL Launcher */
import 'package:url_launcher/url_launcher.dart';
/* Permission Handler */
import 'package:permission_handler/permission_handler.dart';

void main() async {
  /* Set the system UI overlay flags to ensure proper spacing! */
  SystemChrome.setSystemUIOverlayStyle(const SystemUiOverlayStyle(
    statusBarColor: Colors.transparent, /* Set Status Bar Transparent */
  ));

  /* Request Camera Permission */
  WidgetsFlutterBinding
      .ensureInitialized(); // Ensure WidgetsBinding is initialized.
  final status = await Permission.camera.request();
  if (status.isGranted) {
    /* If Granted */
  } else {
    /* If Not Granted */
  }

  runApp(const MyApp());
}

class MyApp extends StatefulWidget {
  const MyApp({Key? key}) : super(key: key);

  @override
  State<MyApp> createState() => _MyAppState();
}

class _MyAppState extends State<MyApp> {
  final Completer<WebViewController> _controller =
      Completer<WebViewController>();

  @override
  void initState() {
    super.initState();
    if (Platform.isAndroid) WebView.platform = AndroidWebView();
  }

  @override
  Widget build(BuildContext context) {
    /* Only Portrait Orientation */
    SystemChrome.setPreferredOrientations([
      DeviceOrientation.portraitUp,
    ]);

    return MaterialApp(
      /* Disable Debug */
      debugShowCheckedModeBanner: false,
      home: Scaffold(
        /* Extra spacing on Top for Notch display! */
        body: SafeArea(
          child: WebView(
              initialUrl: 'https://cow-identifier.codigion.com/',
              javascriptMode: JavascriptMode.unrestricted,
              onWebViewCreated: (WebViewController webViewController) async {
                _controller.complete(webViewController);
              },
              onProgress: (int progress) {
                /* Nothing */
              },
              javascriptChannels: <JavascriptChannel>{
                _toasterJavascriptChannel(context),
              },
              navigationDelegate: (NavigationRequest request) {
                if (!request.url
                    .startsWith("https://cow-identifier.codigion.com/")) {
                  launchExternalURL(request.url);
                  return NavigationDecision.prevent;
                }

                return NavigationDecision.navigate;
              },
              onPageStarted: (String url) {
                /* Nothing */
              },
              onPageFinished: (String url) {
                /* Nothing */
              },
              onWebResourceError: (WebResourceError error) {
                debugPrint('''
                      [Page Resource Error]
                      Code: ${error.errorCode}
                      Description: ${error.description}
                      Error Type: ${error.errorType}
                      ''');
              },
              gestureNavigationEnabled: true,
              geolocationEnabled: false),
        ),
      ),
    );
  }

  /* Launch External URL in Web View */
  void launchExternalURL(String url) async {
    if (url.startsWith('tel:')) {
      await launch(url);
    } else if (url.startsWith('mailto:')) {
      await launch(url);
    } else {
      if (await canLaunch(url)) {
        await launch(url);
      } else {
        throw 'Oops! Cannot Open: $url';
      }
    }
  }

  /* JavaScript Response as Toast */
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
}
