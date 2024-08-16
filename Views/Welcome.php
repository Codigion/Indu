<!-- Content -->
<main class="main">
    <!-- <section class="section-box bg-banner-about banner-home-3 pt-100">
        <div class="banner-hero">
            <div class="banner-inner">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="block-banner">
                            <h3 class="heading-banner text-center wow animate__animated animate__fadeInUp">Cow Identifier</h3>
                            <div class="form-find mw-720 mt-80">
                                <form class="wow animate__animated animate__fadeInUp">
                                <input type="text" class="form-input mr-10" placeholder="Name" />
                                    <input type="text" class="form-input mr-10" placeholder="Email / Phone" />

                                    <a href="<?php echo Generic::baseURL(); ?>/activity" class="btn btn-default btn-find wow animate__ animate__fadeInUp" style="visibility: visible; animation-name: fadeInUp; display: block; margin: 0 auto; text-align: center;">
                                        Try Now
                                    </a>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->


    <section class="section-box mt-50 mb-60">
        <div class="container">
            <div class="text-center">
                <h3>Cow Identifier</h3>
                <br>

                <small>ICAR National Dairy Research Institute, Karnal</small>
                <p class="mt-20">Our AI-powered application identifies individual cows using unique muzzle features, streamlining the process of capturing, processing, and matching images for accurate and efficient livestock management.</p>
                <br>
                <br>
            </div>
            <div class="box-newsletter mt-30">
                <div class="box-form-newsletter">
                    <form action="#!"  id="tryNowForm">
                        <input type="text" class="input-newsletter" name="name" placeholder="Your Full Name!" />
                        <!-- <a href="<?php echo Generic::baseURL(); ?>/activity" class="btn btn-default">TRY</a> -->
                        <a id="tryNowBtn" class="btn btn-default">TRY</a>
                    </form>
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <div id="loading" class="loading-spinner"></div>
                        <div id="response"></div>
                    </div>
                </div>
            </div>
            <script>
                new HTTP().bindAjax({
                    btnID: 'tryNowBtn',
                    formID: 'tryNowForm',
                    extraParameters: '',
                    controllerRoute: 'TryNow',
                    callbackFunction: function(response) {
                        if (!response['err']) {
                            window.location.href = "<?= Generic::baseURL(); ?>/activity";
                        }
                    },
                    responseID: 'response',
                    loadingID: 'loading'
                });
            </script>

            <div class="box-newsletter-bottom">
                <div class="newsletter-bottom"></div>
            </div>
        </div>
    </section>