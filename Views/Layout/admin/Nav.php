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
                    <a class="nav-link" href="<?php echo Generic::baseURL(); ?>/database">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-folder-minus link-icon">
                            <path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path>
                            <line x1="9" y1="14" x2="15" y2="14"></line>
                        </svg>
                        <span class="menu-title">Database</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo Generic::baseURL(); ?>/ai-models">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 50 50">
                            <path d="M49.726,25.312l-18-19c-0.003-0.003-0.007-0.004-0.01-0.007c-0.074-0.076-0.165-0.133-0.26-0.182	c-0.022-0.011-0.038-0.031-0.061-0.041c-0.074-0.032-0.158-0.038-0.24-0.051C31.105,6.023,31.06,6,31.009,6	c-0.001,0-0.003,0.001-0.005,0.001C31.003,6.001,31.001,6,31,6H19.148c-0.026,0-0.048,0.013-0.074,0.015C19.049,6.013,19.026,6,19,6	c-0.002,0-0.005,0-0.007,0c-0.272,0.002-0.532,0.114-0.719,0.312L0.294,25.292c-0.001,0.001-0.001,0.001-0.002,0.002l-0.017,0.018	c-0.038,0.041-0.056,0.091-0.086,0.136c-0.039,0.058-0.085,0.11-0.112,0.176c-0.098,0.241-0.098,0.51,0,0.751	c0.027,0.066,0.073,0.118,0.112,0.176c0.03,0.045,0.048,0.095,0.086,0.136l0.017,0.018c0.001,0.001,0.001,0.001,0.002,0.002	l17.98,18.979c0.188,0.2,0.451,0.354,0.726,0.312c0.026,0,0.049-0.013,0.074-0.015C19.1,45.987,19.122,46,19.148,46H30.78	c0.039,0,0.072-0.018,0.11-0.022C30.928,45.982,30.962,46,31,46c0.002,0,0.005,0,0.007,0c0.272-0.002,0.532-0.114,0.719-0.312l18-19	C50.092,26.302,50.092,25.698,49.726,25.312z M46.675,25H37.95L26.375,13.131l4.611-4.69L46.675,25z M36.023,25.888	c-0.003,0.029-0.016,0.054-0.017,0.083L24.973,37.383L13.801,25.921l11.172-11.364L36.023,25.888z M28.615,8l-3.636,3.698L21.372,8	H28.615z M19.011,8.443l4.565,4.682L11.902,25H3.325L19.011,8.443z M19.008,43.554L3.325,27H12c0.018,0,0.032-0.009,0.05-0.01	l11.532,11.832L19.008,43.554z M21.358,44l3.621-3.745L28.629,44H21.358z M30.99,43.557l-4.621-4.741L37.793,27h8.882L30.99,43.557z"></path>
                        </svg>
                        <span class="menu-title">Models</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo Generic::baseURL(); ?>/model-setting">

                        <!-- Uploaded to: SVG Repo, www.svgrepo.com, Generator: SVG Repo Mixer Tools -->
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 50 50">
                            <g>
                                <path d="M51.22,21h-5.052c-0.812,0-1.481-0.447-1.792-1.197s-0.153-1.54,0.42-2.114l3.572-3.571
		c0.525-0.525,0.814-1.224,0.814-1.966c0-0.743-0.289-1.441-0.814-1.967l-4.553-4.553c-1.05-1.05-2.881-1.052-3.933,0l-3.571,3.571
		c-0.574,0.573-1.366,0.733-2.114,0.421C33.447,9.313,33,8.644,33,7.832V2.78C33,1.247,31.753,0,30.22,0H23.78
		C22.247,0,21,1.247,21,2.78v5.052c0,0.812-0.447,1.481-1.197,1.792c-0.748,0.313-1.54,0.152-2.114-0.421l-3.571-3.571
		c-1.052-1.052-2.883-1.05-3.933,0l-4.553,4.553c-0.525,0.525-0.814,1.224-0.814,1.967c0,0.742,0.289,1.44,0.814,1.966l3.572,3.571
		c0.573,0.574,0.73,1.364,0.42,2.114S8.644,21,7.832,21H2.78C1.247,21,0,22.247,0,23.78v6.439C0,31.753,1.247,33,2.78,33h5.052
		c0.812,0,1.481,0.447,1.792,1.197s0.153,1.54-0.42,2.114l-3.572,3.571c-0.525,0.525-0.814,1.224-0.814,1.966
		c0,0.743,0.289,1.441,0.814,1.967l4.553,4.553c1.051,1.051,2.881,1.053,3.933,0l3.571-3.572c0.574-0.573,1.363-0.731,2.114-0.42
		c0.75,0.311,1.197,0.98,1.197,1.792v5.052c0,1.533,1.247,2.78,2.78,2.78h6.439c1.533,0,2.78-1.247,2.78-2.78v-5.052
		c0-0.812,0.447-1.481,1.197-1.792c0.751-0.312,1.54-0.153,2.114,0.42l3.571,3.572c1.052,1.052,2.883,1.05,3.933,0l4.553-4.553
		c0.525-0.525,0.814-1.224,0.814-1.967c0-0.742-0.289-1.44-0.814-1.966l-3.572-3.571c-0.573-0.574-0.73-1.364-0.42-2.114
		S45.356,33,46.168,33h5.052c1.533,0,2.78-1.247,2.78-2.78V23.78C54,22.247,52.753,21,51.22,21z M52,30.22
		C52,30.65,51.65,31,51.22,31h-5.052c-1.624,0-3.019,0.932-3.64,2.432c-0.622,1.5-0.295,3.146,0.854,4.294l3.572,3.571
		c0.305,0.305,0.305,0.8,0,1.104l-4.553,4.553c-0.304,0.304-0.799,0.306-1.104,0l-3.571-3.572c-1.149-1.149-2.794-1.474-4.294-0.854
		c-1.5,0.621-2.432,2.016-2.432,3.64v5.052C31,51.65,30.65,52,30.22,52H23.78C23.35,52,23,51.65,23,51.22v-5.052
		c0-1.624-0.932-3.019-2.432-3.64c-0.503-0.209-1.021-0.311-1.533-0.311c-1.014,0-1.997,0.4-2.761,1.164l-3.571,3.572
		c-0.306,0.306-0.801,0.304-1.104,0l-4.553-4.553c-0.305-0.305-0.305-0.8,0-1.104l3.572-3.571c1.148-1.148,1.476-2.794,0.854-4.294
		C10.851,31.932,9.456,31,7.832,31H2.78C2.35,31,2,30.65,2,30.22V23.78C2,23.35,2.35,23,2.78,23h5.052
		c1.624,0,3.019-0.932,3.64-2.432c0.622-1.5,0.295-3.146-0.854-4.294l-3.572-3.571c-0.305-0.305-0.305-0.8,0-1.104l4.553-4.553
		c0.304-0.305,0.799-0.305,1.104,0l3.571,3.571c1.147,1.147,2.792,1.476,4.294,0.854C22.068,10.851,23,9.456,23,7.832V2.78
		C23,2.35,23.35,2,23.78,2h6.439C30.65,2,31,2.35,31,2.78v5.052c0,1.624,0.932,3.019,2.432,3.64
		c1.502,0.622,3.146,0.294,4.294-0.854l3.571-3.571c0.306-0.305,0.801-0.305,1.104,0l4.553,4.553c0.305,0.305,0.305,0.8,0,1.104
		l-3.572,3.571c-1.148,1.148-1.476,2.794-0.854,4.294c0.621,1.5,2.016,2.432,3.64,2.432h5.052C51.65,23,52,23.35,52,23.78V30.22z" />
                                <path d="M27,18c-4.963,0-9,4.037-9,9s4.037,9,9,9s9-4.037,9-9S31.963,18,27,18z M27,34c-3.859,0-7-3.141-7-7s3.141-7,7-7
		s7,3.141,7,7S30.859,34,27,34z" />
                            </g>
                        </svg>
                        <span class="menu-title">Model Settings</span>
                    </a>
                </li>

                <!-- <li class="nav-item">
                    <a class="nav-link" href="<?php echo Generic::baseURL(); ?>/contacted">

                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 50 50">
                            <path d="M 13 4 C 8.0414839 4 4 8.0414839 4 13 L 4 37 C 4 41.958516 8.0414839 46 13 46 L 37 46 C 41.958516 46 46 41.958516 46 37 L 46 13 C 46 8.0414839 41.958516 4 37 4 L 13 4 z M 13 6 L 37 6 C 37.355032 6 37.659445 6.150633 38 6.2011719 L 38 43.798828 C 37.659445 43.849367 37.355032 44 37 44 L 13 44 C 9.1225161 44 6 40.877484 6 37 L 6 13 C 6 9.1225161 9.1225161 6 13 6 z M 40 6.7304688 C 42.352068 7.856447 44 10.209434 44 13 L 44 14 L 40 14 L 40 6.7304688 z M 22 12 C 14.832139 12 9 17.832144 9 25 C 9 32.167856 14.832139 38 22 38 C 29.167861 38 35 32.167856 35 25 C 35 17.832144 29.167861 12 22 12 z M 22 14 C 28.086982 14 33 18.913022 33 25 C 33 27.822097 31.934808 30.383342 30.195312 32.328125 C 28.169802 30.27163 25.239791 29 22 29 C 18.758932 29 15.833876 30.276672 13.808594 32.333984 C 12.066333 30.388584 11 27.824608 11 25 C 11 18.913022 15.913018 14 22 14 z M 40 16 L 44 16 L 44 24 L 40 24 L 40 16 z M 22 18 C 20.416667 18 19.101892 18.629756 18.251953 19.585938 C 17.402014 20.542119 17 21.777778 17 23 C 17 24.222222 17.402014 25.457882 18.251953 26.414062 C 19.101892 27.370244 20.416667 28 22 28 C 23.583333 28 24.898108 27.370244 25.748047 26.414062 C 26.597986 25.457881 27 24.222222 27 23 C 27 21.777778 26.597986 20.542118 25.748047 19.585938 C 24.898108 18.629756 23.583333 18 22 18 z M 22 20 C 23.083333 20 23.768559 20.370244 24.251953 20.914062 C 24.735347 21.457881 25 22.222222 25 23 C 25 23.777778 24.735347 24.542118 24.251953 25.085938 C 23.768559 25.629756 23.083333 26 22 26 C 20.916667 26 20.231441 25.629756 19.748047 25.085938 C 19.264653 24.542119 19 23.777778 19 23 C 19 22.222222 19.264653 21.457882 19.748047 20.914062 C 20.231441 20.370244 20.916667 20 22 20 z M 40 26 L 44 26 L 44 34 L 40 34 L 40 26 z M 22 31 C 24.694386 31 27.092805 32.055926 28.730469 33.695312 C 26.87065 35.135558 24.540932 36 22 36 C 19.4616 36 17.134304 35.136865 15.275391 33.699219 C 16.913049 32.060657 19.305741 31 22 31 z M 40 36 L 44 36 L 44 37 C 44 39.790566 42.352068 42.143553 40 43.269531 L 40 36 z"></path>
                        </svg>
                        <span class="menu-title">Contacted</span>
                    </a>
                </li> -->

            </ul>
        </nav>