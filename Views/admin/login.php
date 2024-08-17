    <!-- ======================================
    ******* Page Wrapper Area Start **********
    ======================================= -->
    <div class="main-content- h-100vh">
        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-center">
                <div class="hero">
                    <div class="cube"></div>
                    <div class="cube"></div>
                    <div class="cube"></div>
                    <div class="cube"></div>
                    <div class="cube"></div>
                    <div class="cube"></div>
                    <div class="cube"></div>
                    <div class="cube"></div>
                </div>
                <div class="col-sm-10 col-md-8 col-lg-5">
                    <!-- Middle Box -->
                    <div class="middle-box">
                        <div class="card">
                            <div class="card-body p-4">

                                <!-- Logo -->
                                <h4 class="font-24 mb-30">Login.</h4>
                                <form action="#" id="signInForm">
                                    <div class="form-group">
                                        <input name="email" class="form-control login" type="text" id="emailaddress" placeholder="Enter your email">
                                    </div>

                                    <div class="form-group">
                                        <input name="password" class="form-control login" type="password" id="password" placeholder="Enter your password">
                                    </div>
                                    <div class="text-right">
                                        <div id="loading" class="loading-spinner"></div>
                                        <div id="response"></div>
                                    </div>

                                    <div class="form-group mb-0">
                                        <a id="signInBtn"  class="btn btn-secondary btn-block"> Log In </a>
                                    </div>
                                </form>

                                <!-- end card -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        new HTTP().bindAjax({
            btnID: 'signInBtn',
            formID: 'signInForm',
            extraParameters: '',
            controllerRoute: 'Authenticate',
            callbackFunction: function(response) {
                if (!response['err']) {
                    window.location.href = "<?= Generic::baseURL(); ?>/dashboard";
                }
            },
            responseID: 'response',
            loadingID: 'loading'
        });
    </script>
    <!-- ======================================
    ********* Page Wrapper Area End ***********
    ======================================= -->

    <!-- Plugins Js -->
    <script src="<?php echo Generic::baseURL(); ?>/Assets/admin/js/jquery.min.js"></script>
    <script src="<?php echo Generic::baseURL(); ?>/Assets/admin/js/popper.min.js"></script>
    <script src="<?php echo Generic::baseURL(); ?>/Assets/admin/js/bootstrap.min.js"></script>
    <script src="<?php echo Generic::baseURL(); ?>/Assets/admin/js/bundle.js"></script>

    <!-- Active JS -->
    <script src="<?php echo Generic::baseURL(); ?>/Assets/admin/js/default-assets/active.js"></script>

    </body>

    </html>