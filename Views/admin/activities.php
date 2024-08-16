            <!-- Main Page -->
            <div class="main-panel">
                <div class="content-wrapper">

                    <!-- Table area Start -->
                    <div class="container-fluid"></div>

                    <div class="col-12">
                        <div class="card box-margin">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-20">
                                    <h6 class="card-title mb-0">User's Activities</h6>
                                    <!-- <button type="button" class="btn btn-primary waves-effect waves-light float-right mb-3" data-toggle="modal" data-animation="bounce" data-target=".bs-example-modal-lg">+ Add New</button> -->
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon4">Q</span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Search..." aria-label="Search.." aria-describedby="basic-addon2">
                                </div>

                                <div class="basic-table-area">
                                    <!-- Basic Table -->
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead class="text-uppercase">
                                                <tr>
                                                    <th>Timestamp</th>
                                                    <th>Model Name / Version</th>
                                                    <th>Cow Image</th>
                                                    <th>Cow Muzzle</th>
                                                    <th>Cow ID</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($activities as $activity) : ?>
                                                    <tr>
                                                        <td>
                                                            <?= $activity->timestamp; ?>
                                                        </td>
                                                        <td>

                                                            <?= $activity->model_name; ?> /(<?= $activity->model_version; ?>)
                                                        </td>
                                                        <td>
                                                            <a target="_blank" href="<?= Generic::baseURL(); ?>/Assets/uploads/COW_Picture/<?= $activity->picture_orginal ?>" > Picture  </a>
                                                        </td>
                                                        <td>
                                                            <a target="_blank" href="<?= Generic::baseURL(); ?>/Assets/uploads/COW_Picture/muzzle/<?= $activity->picture_muzzle ?>" >Picture  </a>
                                                        </td>

                                                        <td>#<?= $activity->cow_id; ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- End Basic Table -->
                                </div>

                                <style>
                                    .image-cell {
                                        width: 50%;
                                        text-align: center;
                                    }
                                </style>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>