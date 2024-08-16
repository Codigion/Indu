<!DOCTYPE html>
<html class="no-js" lang="en">
<style>
    body {
        font-family: "Montserrat", sans-serif !important;
    }

    .header {
        padding: 0px 0 !important;
        float: left;
        width: 100%;
        position: absolute;
        top: 0;
        left: 0;
        z-index: 999;
        background: #fff;
    }
</style>

<head>
    <meta charset="utf-8" />
    <title>ICAR</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo Generic::baseURL(); ?>/Assets/logo.png" />
    <!-- Template CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5/1ov7tLJXh9IYsRwzUeWbMnVfFvqU8iFVcCnN" crossorigin="anonymous">
    <!-- Custom -->
    <link rel="stylesheet" href="<?= Generic::baseURL(); ?>/Assets/css/Master.css">
    <script src="<?= Generic::baseURL(); ?>/Assets/js/Master.js"></script>

    <link rel="stylesheet" href="<?php echo Generic::baseURL(); ?>/Assets/css/plugins/animate.min.css" />
    <link rel="stylesheet" href="<?php echo Generic::baseURL(); ?>/Assets/css/main.css?v=1.0" />
    <script src="https://kit.fontawesome.com/b8e9738b29.js" crossorigin="anonymous"></script>

</head>

<body>
    <!-- Preloader Start -->
    <!-- <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="text-center">
                    <img style="height: 25%;width: 100%;" src="<?php echo Generic::baseURL(); ?>/Assets/logo.png" alt="" />
                </div>
            </div>
        </div>
    </div> -->
    <header class="header sticky-bar">
        <div class="container">
            <div class="main-header">
                <div class="header-left">
                    <div class="header-logo">
                        <a href="<?php echo Generic::baseURL(); ?>" style="width: 30%;" class="d-flex mt-10 mb-10"><img alt="" src="<?php echo Generic::baseURL(); ?>/Assets/logo.png" /></a>
                    </div>
                    <div class="header-nav">
                        <nav class="nav-main-menu d-none d-xl-block">
                            <ul class="main-menu">
                                <li>
                                    <a class="active" href="<?php echo Generic::baseURL(); ?>/">Home</a>
                                </li>
                                <li>
                                    <a class="active" href="<?php echo Generic::baseURL(); ?>/about-us">About Us</a>
                                </li>
                                <li>
                                    <a class="active" href="<?php echo Generic::baseURL(); ?>/contact-us">Contact Us</a>
                                </li>
                                <li>
                                    <a class="active" href="<?php echo Generic::baseURL(); ?>/faq">F.A.Q</a>
                                </li>

                            </ul>
                        </nav>
                        <div class="burger-icon burger-icon-white">
                            <span class="burger-icon-top"></span>
                            <span class="burger-icon-mid"></span>
                            <span class="burger-icon-bottom"></span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </header>
    <div class="mobile-header-active mobile-header-wrapper-style perfect-scrollbar">
        <div class="mobile-header-wrapper-inner">
            <div class="mobile-header-top">
                <div class="user-account">
                    <div class="content">
                    </div>
                </div>
                <div class="burger-icon burger-icon-white">
                    <span class="burger-icon-top"></span>
                    <span class="burger-icon-mid"></span>
                    <span class="burger-icon-bottom"></span>
                </div>
            </div>
            <div class="mobile-header-content-area">
                <div class="perfect-scroll">

                    <div class="mobile-menu-wrap mobile-header-border">
                        <!-- mobile menu start -->
                        <nav>
                            <ul class="mobile-menu font-heading">
                                <li>
                                    <a class="active" href="<?php echo Generic::baseURL(); ?>/">Home</a>
                                </li>
                                <li>
                                    <a href="<?php echo Generic::baseURL(); ?>/about-us">About Us</a>
                                </li>
                                <li>
                                    <a href="<?php echo Generic::baseURL(); ?>/contact-us">Contact Us</a>
                                </li>
                                <li>
                                    <a href="<?php echo Generic::baseURL(); ?>/faq">F.A.Q</a>
                                </li>
                                <!-- <div class="mobile-account">
                                    <h6 class="mb-10">Follow Us</h6>

                                    <div class="mobile-social-icon mb-50">
                                        <h6 class="mb-25"></h6>
                                        <a href="#"><img src="<?php echo Generic::baseURL(); ?>/Assets/imgs/theme/icons/icon-facebook.svg" alt="" /></a>
                                        <a href="#"><img src="<?php echo Generic::baseURL(); ?>/Assets/imgs/theme/icons/icon-twitter.svg" alt="" /></a>
                                        <a href="#"><img src="<?php echo Generic::baseURL(); ?>/Assets/imgs/theme/icons/icon-instagram.svg" alt="" /></a>
                                        <a href="#"><img src="<?php echo Generic::baseURL(); ?>/Assets/imgs/theme/icons/icon-pinterest.svg" alt="" /></a>
                                        <a href="#"><img src="<?php echo Generic::baseURL(); ?>/Assets/imgs/theme/icons/icon-youtube.svg" alt="" /></a>
                                    </div>
                                </div> -->
                            </ul>
                        </nav>
                        <!-- mobile menu end -->
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!--End header-->