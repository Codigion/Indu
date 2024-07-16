<!-- Main Page -->
<div class="main-panel">
    <div class="content-wrapper">



                    <!-- Table area Start -->
                    <div class="container-fluid"></div>

                    <div class="col-12">
                        <div class="card box-margin">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-20">
                                    <h6 class="card-title mb-0">New Cow Detetion Model</h6>
                                    <!-- <button type="button" class="btn btn-primary waves-effect waves-light float-right mb-3" data-toggle="modal" data-animation="bounce" data-target=".bs-example-modal-lg">+ Add New</button> -->
                                </div>
                                
                                    <div class="row">
                                        <div class="col-sm-12 col-xs-12">
                                            <form>
                                                <div class="row">
                                                <div class="col-sm-3 col-xs-3 col-3">
                                                <div class="form-group">
                                                    <label for="exampleInputPassword11">Version</label>
                                                    <input type="text" class="form-control" id="exampleInputPassword11" placeholder="Version">
                                                </div>
                                                    </div>
                                                    <div class="col-sm-3 col-xs-3 col-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail111">YOLO Model</label>
                                                    <input type="file" class="form-control"/>
                                                </div>
                                                </div>
                                                <div class="col-sm-3 col-xs-3 col-3">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail12">ResNet50</label>
                                                    <input type="file" class="form-control"/>
                                                </div>
                                                </div>
                                                <div class="col-sm-3 col-xs-3 col-3">
                                                <div class="text-right">
                                                <button type="submit" class="btn btn-primary mr-2 mt-20">Upload Model</button>
                                                </div>
                            </div>
                                            </form>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>



                    <div class="row">
                    <div class="col-12">
                        <div class="card box-margin">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-20">
                                    <h6 class="card-title mb-0">Live Models</h6>
                                    <!-- <button type="button" class="btn btn-primary waves-effect waves-light float-right mb-3" data-toggle="modal" data-animation="bounce" data-target=".bs-example-modal-lg">+ Add New</button> -->
                                </div>
                                <div class="basic-table-area">
                                    <!--Basic Table-->
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead class="text-uppercase">
                                                <tr>
                                                    <th>Status</th>
                                                    <th>Timestamp</th>
                                                    <th>Version</th>
                                                    <th>No. Consumptions</th>
                                                    <!-- <th>Phone Number</th> -->
                                                    <!-- <th>Email</th> -->
                                                    <th>Options</th>
                                                </tr>
                                            </thead>

                                            <tbody>

                                                <tr>
                                                    <td>
                                                        <select class="form-control">
                                                            <option>Active</option>
                                                            <option>Inactive</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <h4 class="h6 g-mb-2">01-01-2024 00:00</h4>
                                                    </td>
                                                    <td>
                                                        <h4 class="h6 g-mb-2">v1.0.0</h4>
                                                    </td>
                                                    <td><h4 class="h6 g-mb-2">0</h4></td>
                                                    <!-- <td>00000-00000</td> -->
                                                    <!-- <td class="align-middle">
                                                        <div class="d-flex">
                                                            <i class="fa fa-email mr-2 font-16" aria-hidden="true"></i>
                                                            <span>john@gmail.com</span>
                                                        </div>
                                                    </td> -->
                                                    <td>
                                                        <a class="btn btn-outline-warning btn-sm" href="<?php echo Generic::baseURL(); ?>/activities">
                                                            Edit
                                                        </a>
                                                        &nbsp;
                                                        <a class="btn btn-outline-danger btn-sm" href="<?php echo Generic::baseURL(); ?>/activities">
                                                            Delete
                                                        </a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!--End Basic Table-->
                                </div>

                            </div>
                        </div>
                    </div>
                    </div>
    </div>