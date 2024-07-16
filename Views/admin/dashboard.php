<!-- partial -->
<style>
    .height-card {
        display:contents;
    }
</style>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-6 col-xl">
                    <!-- Card -->
                    <div class="card box-margin">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <!-- Title -->
                                    <h6 class="text-uppercase font-14">
                                        Users
                                    </h6>

                                    <!-- Heading -->
                                    <span class="font-24 text-dark mb-0">
                                        0
                                    </span>
                                </div>

                                <div class="col-auto">
                                    <!-- Icon -->
                                    <div class="icon">
                                        <i class="fa fa-users"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-xl">
                    <!-- Card -->
                    <div class="card box-margin">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <!-- Title -->
                                    <h6 class="font-14 text-uppercase">
                                        Cow Pictures
                                    </h6>
                                    <!-- Heading -->
                                    <span class="font-24 text-dark mb-0">
                                        0
                                    </span>
                                </div>
                                <div class="col-auto">
                                    <!-- Icon -->
                                    <div class="icon">
                                        <img src="<?php echo Generic::baseURL(); ?>/Assets/admin/img/bg-img/icon-5.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-12 col-sm-12 col-xl">
                    <!-- Card -->
                    <div class="card box-margin">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <!-- Title -->
                                    <h6 class="font-14 text-uppercase">
                                        Unquie Visitors
                                    </h6>
                                    <!-- Heading -->
                                    <span class="font-24 text-dark">
                                        0
                                    </span>
                                </div>
                                <div class="col-auto">
                                    <!-- Icon -->
                                    <div class="icon">
                                        <img src="<?php echo Generic::baseURL(); ?>/Assets/admin/img/bg-img/icon-11.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- / .row -->

            <div class="row">
                <!-- Order Summary -->
                <div class="col-lg-8 col-12 box-margin height-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-50">
                                <h4 class="card-title mb-0">Session <span class="break-320-480-none">Summary</span></h4>

                            </div>
                        </div>

                        <!-- Order Chart -->
                        <div class="card-body p-0">
                            <div class="card-content">
                                <div id="order-summary-chart"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Latest Update Area -->
                <div class="col-lg-4 box-margin height-card">
                    <div class="card">
                        <div class="card-body">
                            <!-- <h5 class="card-title">Latest Update</h5> -->
                            <div class="transaction-area">
                              
                                <div class="d-flex flex-row list-group-item align-items-center justify-content-between">
                                    <div class="media d-flex justify-content-center align-items-center">
                                        <div class="icon-section bg-danger-soft">
                                            <i class="fa fa-newspaper-o"></i>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="mb-1 font-15">Page Views</h6>
                                        </div>
                                    </div>

                                    <div class="amount txt-gray-5">
                                        <h5 class="mb-0">0</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>