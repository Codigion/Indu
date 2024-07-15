<style>
    .navbar .navbar-brand-wrapper .navbar-brand img {
        max-width: 100%;
        height: 45px;
        margin: auto;
        vertical-align: middle;
    }
</style>

<!-- ======================================
    ******* Main Page Wrapper **********
    ======================================= -->

<div class="main-container-wrapper">
    <!-- Top bar area -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
            <a class="navbar-brand brand-logo" href=""><img src="<?php echo Generic::baseURL(); ?>/Assets/logo.png" class="mr-2" alt="logo" /></a>
            <a class="navbar-brand brand-logo-mini" href="index.html"><img src="<?php echo Generic::baseURL(); ?>/Assets/logo.png" alt="logo" /></a>
            <h4 style="height: 20px;">ICAR</h4>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-between">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu">
                    <line x1="3" y1="12" x2="21" y2="12"></line>
                    <line x1="3" y1="6" x2="21" y2="6"></line>
                    <line x1="3" y1="18" x2="21" y2="18"></line>
                </svg>
            </button>

            <ul class="top-navbar-area navbar-nav navbar-nav-right">

                <li class="nav-item nav-profile dropdown dropdown-animate">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                        <img src="<?php echo Generic::baseURL(); ?>/Assets/logo.png" alt="profile" />
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown profile-top" aria-labelledby="profileDropdown">
                        <a href="<?php echo Generic::baseURL(); ?>/account-settings" class="dropdown-item"><i class="zmdi zmdi-brightness-7 profile-icon" aria-hidden="true"></i> Settings</a>
                        <a href="<?php echo Generic::baseURL(); ?>/sign-out" class="dropdown-item"><i class="ti-unlink profile-icon" aria-hidden="true"></i> Sign-out</a>
                    </div>
                </li>
            </ul>

            <button class="navbar-toggler navbar-toggler-right d-xl-none align-self-center" type="button" data-toggle="offcanvas">
                <span class="ti-layout-grid2"></span>
            </button>
        </div>
    </nav>

    <div class="container-fluid page-body-wrapper">
        <!-- Side Menu area -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo Generic::baseURL(); ?>/dashboard">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="24" height="24" viewBox="0 0 256 256" xml:space="preserve">
                            <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)">
                                <path d="M 49.501 20 H 7.378 c -0.552 0 -1 -0.448 -1 -1 s 0.448 -1 1 -1 h 42.123 c 0.553 0 1 0.448 1 1 S 50.054 20 49.501 20 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                <path d="M 82.622 20 h -3.814 c -0.553 0 -1 -0.448 -1 -1 s 0.447 -1 1 -1 h 3.814 c 0.553 0 1 0.448 1 1 S 83.175 20 82.622 20 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                <path d="M 73.622 20 h -3.814 c -0.553 0 -1 -0.448 -1 -1 s 0.447 -1 1 -1 h 3.814 c 0.553 0 1 0.448 1 1 S 74.175 20 73.622 20 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                <path d="M 46.907 79.28 h -3.814 c -0.552 0 -1 -0.447 -1 -1 s 0.448 -1 1 -1 h 3.814 c 0.553 0 1 0.447 1 1 S 47.46 79.28 46.907 79.28 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                <path d="M 85.427 10.719 H 4.573 C 2.052 10.719 0 12.771 0 15.292 v 59.416 c 0 2.521 2.052 4.572 4.573 4.572 h 31.5 c 0.552 0 1 -0.447 1 -1 s -0.448 -1 -1 -1 h -31.5 C 3.154 77.28 2 76.126 2 74.708 V 26.016 h 86 v 48.692 c 0 1.418 -1.154 2.572 -2.573 2.572 h -31.5 c -0.553 0 -1 0.447 -1 1 s 0.447 1 1 1 h 31.5 c 2.521 0 4.573 -2.051 4.573 -4.572 V 15.292 C 90 12.771 87.948 10.719 85.427 10.719 z M 2 24.016 v -8.723 c 0 -1.419 1.154 -2.573 2.573 -2.573 h 80.854 c 1.419 0 2.573 1.154 2.573 2.573 v 8.723 H 2 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                <path d="M 22.741 71.875 h -6.482 c -1.462 0 -2.651 -1.189 -2.651 -2.651 v -8.482 c 0 -1.462 1.189 -2.651 2.651 -2.651 h 6.482 c 1.462 0 2.651 1.189 2.651 2.651 v 8.482 C 25.393 70.686 24.203 71.875 22.741 71.875 z M 16.259 60.09 c -0.359 0 -0.651 0.292 -0.651 0.651 v 8.482 c 0 0.359 0.292 0.651 0.651 0.651 h 6.482 c 0.359 0 0.651 -0.292 0.651 -0.651 v -8.482 c 0 -0.359 -0.292 -0.651 -0.651 -0.651 H 16.259 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                <path d="M 39.741 71.875 h -6.482 c -1.462 0 -2.651 -1.189 -2.651 -2.651 V 56.741 c 0 -1.462 1.189 -2.651 2.651 -2.651 h 6.482 c 1.462 0 2.651 1.189 2.651 2.651 v 12.482 C 42.393 70.686 41.203 71.875 39.741 71.875 z M 33.259 56.09 c -0.359 0 -0.651 0.292 -0.651 0.651 v 12.482 c 0 0.359 0.292 0.651 0.651 0.651 h 6.482 c 0.359 0 0.651 -0.292 0.651 -0.651 V 56.741 c 0 -0.359 -0.292 -0.651 -0.651 -0.651 H 33.259 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                <path d="M 56.741 71.875 h -6.482 c -1.462 0 -2.651 -1.189 -2.651 -2.651 V 46.741 c 0 -1.462 1.189 -2.651 2.651 -2.651 h 6.482 c 1.462 0 2.651 1.189 2.651 2.651 v 22.482 C 59.393 70.686 58.203 71.875 56.741 71.875 z M 50.259 46.09 c -0.359 0 -0.651 0.292 -0.651 0.651 v 22.482 c 0 0.359 0.292 0.651 0.651 0.651 h 6.482 c 0.359 0 0.651 -0.292 0.651 -0.651 V 46.741 c 0 -0.359 -0.292 -0.651 -0.651 -0.651 H 50.259 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                <path d="M 73.741 71.875 h -6.482 c -1.462 0 -2.651 -1.189 -2.651 -2.651 V 34.741 c 0 -1.462 1.189 -2.651 2.651 -2.651 h 6.482 c 1.462 0 2.651 1.189 2.651 2.651 v 34.482 C 76.393 70.686 75.203 71.875 73.741 71.875 z M 67.259 34.09 c -0.359 0 -0.651 0.292 -0.651 0.651 v 34.482 c 0 0.359 0.292 0.651 0.651 0.651 h 6.482 c 0.359 0 0.651 -0.292 0.651 -0.651 V 34.741 c 0 -0.359 -0.292 -0.651 -0.651 -0.651 H 67.259 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                            </g>
                        </svg>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo Generic::baseURL(); ?>/users">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-box link-icon">
                            <circle cx="12" cy="6" r="4" stroke="#1C274C" stroke-width="1.5" />
                            <path d="M19.9975 18C20 17.8358 20 17.669 20 17.5C20 15.0147 16.4183 13 12 13C7.58172 13 4 15.0147 4 17.5C4 19.9853 4 22 12 22C14.231 22 15.8398 21.8433 17 21.5634" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" />
                        </svg>
                        <span class="menu-title">Users</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?php echo Generic::baseURL(); ?>/models">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 50 50">
                            <path d="M49.726,25.312l-18-19c-0.003-0.003-0.007-0.004-0.01-0.007c-0.074-0.076-0.165-0.133-0.26-0.182	c-0.022-0.011-0.038-0.031-0.061-0.041c-0.074-0.032-0.158-0.038-0.24-0.051C31.105,6.023,31.06,6,31.009,6	c-0.001,0-0.003,0.001-0.005,0.001C31.003,6.001,31.001,6,31,6H19.148c-0.026,0-0.048,0.013-0.074,0.015C19.049,6.013,19.026,6,19,6	c-0.002,0-0.005,0-0.007,0c-0.272,0.002-0.532,0.114-0.719,0.312L0.294,25.292c-0.001,0.001-0.001,0.001-0.002,0.002l-0.017,0.018	c-0.038,0.041-0.056,0.091-0.086,0.136c-0.039,0.058-0.085,0.11-0.112,0.176c-0.098,0.241-0.098,0.51,0,0.751	c0.027,0.066,0.073,0.118,0.112,0.176c0.03,0.045,0.048,0.095,0.086,0.136l0.017,0.018c0.001,0.001,0.001,0.001,0.002,0.002	l17.98,18.979c0.188,0.2,0.451,0.354,0.726,0.312c0.026,0,0.049-0.013,0.074-0.015C19.1,45.987,19.122,46,19.148,46H30.78	c0.039,0,0.072-0.018,0.11-0.022C30.928,45.982,30.962,46,31,46c0.002,0,0.005,0,0.007,0c0.272-0.002,0.532-0.114,0.719-0.312l18-19	C50.092,26.302,50.092,25.698,49.726,25.312z M46.675,25H37.95L26.375,13.131l4.611-4.69L46.675,25z M36.023,25.888	c-0.003,0.029-0.016,0.054-0.017,0.083L24.973,37.383L13.801,25.921l11.172-11.364L36.023,25.888z M28.615,8l-3.636,3.698L21.372,8	H28.615z M19.011,8.443l4.565,4.682L11.902,25H3.325L19.011,8.443z M19.008,43.554L3.325,27H12c0.018,0,0.032-0.009,0.05-0.01	l11.532,11.832L19.008,43.554z M21.358,44l3.621-3.745L28.629,44H21.358z M30.99,43.557l-4.621-4.741L37.793,27h8.882L30.99,43.557z"></path>
                        </svg>
                        <span class="menu-title">Models</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?php echo Generic::baseURL(); ?>/settings">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-box link-icon">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M9.75195 12.0128C9.75175 11.0587 10.4087 10.2372 11.3211 10.0509C12.2335 9.86458 13.1472 10.3652 13.5034 11.2467C13.8595 12.1282 13.559 13.1449 12.7856 13.6752C12.0121 14.2054 10.9812 14.1014 10.3233 13.4268C9.95757 13.0518 9.75206 12.5432 9.75195 12.0128Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M10.3077 5.46781C10.2943 4.94809 10.557 4.46185 10.9937 4.19793C11.4305 3.93402 11.9725 3.93402 12.4092 4.19793C12.8459 4.46185 13.1086 4.94809 13.0952 5.46781V6.18481C14.1532 6.45066 15.1177 7.01454 15.8798 7.81281L16.4346 7.47881C16.7552 7.28632 17.1379 7.23446 17.4962 7.33495C17.8545 7.43544 18.1583 7.6798 18.3388 8.01281C18.7238 8.70718 18.4973 9.58984 17.8288 9.99981L17.3121 10.3108C17.6296 11.4207 17.6296 12.6009 17.3121 13.7108L17.8288 14.0218C18.4996 14.4319 18.7264 15.3175 18.3388 16.0128C18.1579 16.3455 17.8541 16.5894 17.4958 16.6895C17.1375 16.7896 16.7549 16.7375 16.4346 16.5448L15.8798 16.2108C15.1177 17.01 14.1528 17.5746 13.0942 17.8408V18.5578C13.1076 19.0775 12.845 19.5638 12.4082 19.8277C11.9715 20.0916 11.4295 20.0916 10.9927 19.8277C10.556 19.5638 10.2933 19.0775 10.3067 18.5578V17.8408C9.24871 17.575 8.28422 17.0111 7.52212 16.2128L6.96735 16.5468C6.64684 16.739 6.26438 16.7907 5.90629 16.6902C5.5482 16.5897 5.24464 16.3455 5.06415 16.0128C4.67911 15.3184 4.90563 14.4358 5.57407 14.0258L6.09082 13.7148C5.77329 12.6049 5.77329 11.4247 6.09082 10.3148L5.57407 10.0038C4.90333 9.59369 4.67651 8.70808 5.06415 8.01281C5.24498 7.68014 5.54885 7.43621 5.90715 7.3361C6.26546 7.236 6.64797 7.28816 6.96832 7.48081L7.5231 7.81481C8.28484 7.01545 9.24936 6.4505 10.3077 6.18381V5.46781Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <span class="menu-title">Settings</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo Generic::baseURL(); ?>/contacted">

                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 50 50">
                            <path d="M 13 4 C 8.0414839 4 4 8.0414839 4 13 L 4 37 C 4 41.958516 8.0414839 46 13 46 L 37 46 C 41.958516 46 46 41.958516 46 37 L 46 13 C 46 8.0414839 41.958516 4 37 4 L 13 4 z M 13 6 L 37 6 C 37.355032 6 37.659445 6.150633 38 6.2011719 L 38 43.798828 C 37.659445 43.849367 37.355032 44 37 44 L 13 44 C 9.1225161 44 6 40.877484 6 37 L 6 13 C 6 9.1225161 9.1225161 6 13 6 z M 40 6.7304688 C 42.352068 7.856447 44 10.209434 44 13 L 44 14 L 40 14 L 40 6.7304688 z M 22 12 C 14.832139 12 9 17.832144 9 25 C 9 32.167856 14.832139 38 22 38 C 29.167861 38 35 32.167856 35 25 C 35 17.832144 29.167861 12 22 12 z M 22 14 C 28.086982 14 33 18.913022 33 25 C 33 27.822097 31.934808 30.383342 30.195312 32.328125 C 28.169802 30.27163 25.239791 29 22 29 C 18.758932 29 15.833876 30.276672 13.808594 32.333984 C 12.066333 30.388584 11 27.824608 11 25 C 11 18.913022 15.913018 14 22 14 z M 40 16 L 44 16 L 44 24 L 40 24 L 40 16 z M 22 18 C 20.416667 18 19.101892 18.629756 18.251953 19.585938 C 17.402014 20.542119 17 21.777778 17 23 C 17 24.222222 17.402014 25.457882 18.251953 26.414062 C 19.101892 27.370244 20.416667 28 22 28 C 23.583333 28 24.898108 27.370244 25.748047 26.414062 C 26.597986 25.457881 27 24.222222 27 23 C 27 21.777778 26.597986 20.542118 25.748047 19.585938 C 24.898108 18.629756 23.583333 18 22 18 z M 22 20 C 23.083333 20 23.768559 20.370244 24.251953 20.914062 C 24.735347 21.457881 25 22.222222 25 23 C 25 23.777778 24.735347 24.542118 24.251953 25.085938 C 23.768559 25.629756 23.083333 26 22 26 C 20.916667 26 20.231441 25.629756 19.748047 25.085938 C 19.264653 24.542119 19 23.777778 19 23 C 19 22.222222 19.264653 21.457882 19.748047 20.914062 C 20.231441 20.370244 20.916667 20 22 20 z M 40 26 L 44 26 L 44 34 L 40 34 L 40 26 z M 22 31 C 24.694386 31 27.092805 32.055926 28.730469 33.695312 C 26.87065 35.135558 24.540932 36 22 36 C 19.4616 36 17.134304 35.136865 15.275391 33.699219 C 16.913049 32.060657 19.305741 31 22 31 z M 40 36 L 44 36 L 44 37 C 44 39.790566 42.352068 42.143553 40 43.269531 L 40 36 z"></path>
                        </svg>
                        <span class="menu-title">Contacted</span>
                    </a>
                </li>

            </ul>
        </nav>