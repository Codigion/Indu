<!DOCTYPE html>
<html class="no-js" lang="en">
<style>
    body {
        font-family: "Montserrat", sans-serif !important;
    }

    .header {
        padding: 0px 0 !important;
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
    <title>ICAR-NDRI</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo Generic::baseURL(); ?>/Assets/logo4.png" />
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
                    <img style="height: 25%;width: 100%;" src="<?php echo Generic::baseURL(); ?>/Assets/logo2.png" alt="" />
                </div>
            </div>
        </div>
    </div> -->
    <style>
        .header {
            padding: 0px;
            width: 100%;
            position: absolute;
            top: 0;
            left: 0;
            z-index: 999;
            background: #fff;
            display: flex;
            align-items: center;
            /* Centers the content vertically */
            justify-content: space-between;
            /* Positions the children at the start and end */
        }


        .header-content {
            width: 100%;
            display: flex;
            justify-content: space-between;
            /* Pushes the children to both ends */
        }

        .header-left,
        .header-right {
            flex: 1;
            /* Gives an equal amount of space to each side */
            display: flex;
            align-items: center;
            /* Vertically centers the images */
        }

        .header-right {
            justify-content: flex-end;
            padding-right: 10px;
            /* Increase this value to push more to the right */
            margin-top: 4px;
            /* Aligns the right logo to the right */
        }
    </style>
    <header class="header sticky-bar">
        <div class="container">
            <div class="header-content">
                <div class="header-left">
                    <a href="<?php echo Generic::baseURL(); ?>">
                        <img style="max-width:60px;" alt="Logo" src="<?php echo Generic::baseURL(); ?>/Assets/logo.png" />
                    </a>
                </div>
                <?php if (isset($username) && !empty($username[0]->username)) { ?>
                    <nav class="navbar">
                        <div class="container-fluid d-flex flex-column align-items-center">
                            <div class="navbar-text text-center">
                                <span class="welcome-message">Welcome,</span>
                                <br>
                                <strong class="username"><?= $username[0]->username ?></strong>
                            </div>
                            <div  class="text-center">
                                <a  style="color:red;" href="<?= Generic::baseURL(); ?>/SignOutUser" >
                                    Sign Out &nbsp; <i class="fa-solid fa-right-from-bracket"></i>
                                </a>
                            </div>
                        </div>
                    </nav>
                <?php } ?>
                <div class="header-right">
                    <a href="<?php echo Generic::baseURL(); ?>">
                        <img style="max-width:60px;" alt="Logo" src="<?php echo Generic::baseURL(); ?>/Assets/logo1.png" />
                    </a>
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
                                <!-- 
                                <div class="mobile-account">
                                    <h6 class="mb-10">Follow Us</h6>

                                    <div class="mobile-social-icon mb-50">
                                        <h6 class="mb-25"></h6>
                                        <a href="#"><img src="<?php echo Generic::baseURL(); ?>/Assets/imgs/theme/icons/icon-facebook.svg" alt="" /></a>
                                        <a href="#"><img src="<?php echo Generic::baseURL(); ?>/Assets/imgs/theme/icons/icon-twitter.svg" alt="" /></a>
                                        <a href="#"><img src="<?php echo Generic::baseURL(); ?>/Assets/imgs/theme/icons/icon-instagram.svg" alt="" /></a>
                                        <a href="#"><img src="<?php echo Generic::baseURL(); ?>/Assets/imgs/theme/icons/icon-pinterest.svg" alt="" /></a>
                                        <a href="#"><img src="<?php echo Generic::baseURL(); ?>/Assets/imgs/theme/icons/icon-youtube.svg" alt="" /></a>
                                    </div>
                                </div> 
                                -->
                            </ul>
                        </nav>
                        <!-- mobile menu end -->
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!--End header-->