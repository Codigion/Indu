<!-- Main Page -->
<div class="main-panel">
    <div class="content-wrapper">
        <!-- Table area Start -->
        <div class="container-fluid"></div>
        <div class="row">

            <div class="col-12">
                <div class="card box-margin">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-20">
                            <h6 class="card-title mb-0">New Cow Detetion Model</h6>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <form id="addModelForm">
                                    <div class="row">
                                        <div class="col-sm-3 col-12 mb-3">
                                            <div class="form-group">
                                                <label for="nameInput">Name the model</label>
                                                <small>(will be displayed in web portal)</small>
                                                <input name="name" type="text" class="form-control" id="nameInput" placeholder="Enter name">
                                            </div>
                                        </div>
                                        <div class="col-sm-3 col-12 mb-3">
                                            <div class="form-group">
                                                <label for="versionInput">Version (eg: v0.0.0)</label>
                                                <input name="version" type="text" class="form-control" id="versionInput" placeholder="Enter version">
                                            </div>
                                        </div>
                                        <div class="col-sm-3 col-12 mb-3">
                                            <div class="form-group">
                                                <label for="yoloModel">YOLO Model</label>
                                                <input name="yolo" type="file" class="form-control" id="yoloModel" />
                                            </div>
                                        </div>

                                        <div class="col-sm-3 col-12 mb-3">
                                            <div class="form-group">
                                                <label for="resnetModel">ResNet50 Model</label>
                                                <input name="resnet" type="file" class="form-control" id="resnetModel" />
                                            </div>
                                        </div>
                                        <div class="col-sm-3 col-12 mb-3">
                                            <div class="form-group">
                                                <label for="resnetModel">Cow Database i.e (.yml)</label>
                                                <input name="yml" type="file" class="form-control" id="resnetModel" />
                                            </div>
                                        </div>

                                        <div class="col-12 text-right mt-3">
                                            <div class="text-right">
                                                <div id="loading" class="loading-spinner"></div>
                                                <div id="response"></div>
                                            </div>
                                            <a id="addModelBtn" type="submit" class="btn btn-secondary">Add Model</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <script>
                new HTTP().bindAjax({
                    btnID: 'addModelBtn',
                    formID: 'addModelForm',
                    extraParameters: '',
                    controllerRoute: 'AddModel',
                    callbackFunction: function(response) {
                        if (!response['err']) {
                            window.location.href = "<?= Generic::baseURL(); ?>/ai-models";
                        }
                    },
                    responseID: 'response',
                    loadingID: 'loading'
                });
            </script>

            <div class="col-12">
                <div class="card box-margin">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-20">
                            <h6 class="card-title mb-0">Live Models</h6>
                        </div>
                        <div class="basic-table-area">
                            <!--Basic Table-->
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="text-uppercase">
                                        <tr>
                                            <th>#ID</th>
                                            <th>Status</th>
                                            <th>Timestamp</th>
                                            <th>Model Name / Version</th>
                                            <th>No. Passed Consumptions</th>
                                            <th>No. Failed Consumptions</th>
                                            <th>Options</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php foreach ($models as $model) : ?>
                                            <tr>
                                                <td>
                                                    <h4 class="h6 g-mb-2"><?= $model->id; ?> </h4>
                                                </td>
                                                <td>
                                                    <select name='is_active' class="form-control" onchange="changeStatus(this,'<?= $model->id; ?>')">
                                                        <option value='1' <?= ($model->active_status == 1) ? 'selected' : ''; ?>>Active</option>
                                                        <option value='0' <?= ($model->active_status == 0) ? 'selected' : ''; ?>>Inactive</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <h4 class="h6 g-mb-2"><?= $model->timestamp; ?> </h4>
                                                </td>
                                                <td>
                                                    <h4 class="h6 g-mb-2"><?= $model->model_name; ?> / <?= $model->model_version;  ?></h4>
                                                </td>
                                                <td>
                                                    <h4 class="h6 g-mb-2"><?= $model->no_of_consumptions; ?></h4>
                                                </td>
                                                <td>
                                                    <h4 class="h6 g-mb-2"><?= $model->no_of_failed_consumptions; ?></h4>
                                                </td>
                                                <td>
                                                    <!-- <a class="btn btn-outline-warning btn-sm" href="<?php echo Generic::baseURL(); ?>/activities">
                                                    Edit
                                                </a>  -->
                                                    &nbsp;
                                                    <a onclick="deleteModel('<?= $model->id; ?>')" class="btn btn-outline-danger btn-sm" >
                                                        Delete
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
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

    <script>
        function changeStatus(event, modelID) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning', // use 'icon' instead of 'type'
                showCancelButton: true,
                confirmButtonColor: '#0CC27E',
                cancelButtonColor: '#FF586B',
                confirmButtonText: 'Yes, update it!',
                cancelButtonText: 'No, cancel!',
                buttonsStyling: false,
                customClass: {
                    confirmButton: 'btn btn-success mr-5',
                    cancelButton: 'btn btn-danger'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    new HTTP().ajaxRequest(
                        '',
                        'id=' + modelID + '&is_active=' + event.value,
                        'ChangeStatus',
                        function(response) {
                            if (!response['err']) {
                                Swal.fire('Updated Status!', 'Model status is updated.', 'success').then(() => {
                                    window.location.href = "<?= Generic::baseURL(); ?>/ai-models";
                                });
                            } else {
                                Swal.fire('Error!', response['msg'], 'error');
                            }
                        },
                        'x',
                        'x'
                    );
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    Swal.fire('Cancelled', 'The action is cancelled.', 'error');
                }
            });
        }
        function deleteModel(modelID) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning', 
                showCancelButton: true,
                confirmButtonColor: '#0CC27E',
                cancelButtonColor: '#FF586B',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                buttonsStyling: false,
                customClass: {
                    confirmButton: 'btn btn-success mr-5',
                    cancelButton: 'btn btn-danger'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    new HTTP().ajaxRequest(
                        '',
                        'id=' + modelID,
                        'DeleteModel',
                        function(response) {
                            if (!response['err']) {
                                Swal.fire('Deleted!', 'Model status is Deleted.', 'success').then(() => {
                                    window.location.href = "<?= Generic::baseURL(); ?>/ai-models";
                                });
                            } else {
                                Swal.fire('Error!', response['msg'], 'error');
                            }
                        },
                        'x',
                        'x'
                    );
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    Swal.fire('Cancelled', 'The action is cancelled.', 'error');
                }
            });
        }
    </script>