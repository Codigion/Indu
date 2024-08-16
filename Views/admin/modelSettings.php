<!-- Main Page -->
<div class="main-panel">
    <div class="content-wrapper">
        <!-- Table area Start -->
        <div class="container-fluid"></div>

        <div class="col-12">
            <div class="card box-margin">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-20">
                        <h6 class="card-title mb-0">Model Settings</h6>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <form id="updateSettingsForm" >
                                <div class="row">
                                    <div class="col-sm-3 col-12 mb-3">
                                        <div class="form-group">
                                            <label for="confidenceThreshold">
                                                Threshold <br>
                                                <small class="form-text text-muted">
                                                    Confidence score (0.1 to 1.0). Default is 0.8. Higher values indicate higher confidence.
                                                </small>
                                            </label>
                                            <input type="text" name="threshold" value="<?= $settings->threshold; ?>" class="form-control" id="confidenceThreshold" placeholder="Enter threshold">
                                        </div>
                                    </div>

                                    <div class="col-sm-3 col-12 mb-3">
                                        <div class="form-group">
                                            <label for="temperatureControl">
                                                Temperature Control <br>
                                                <small class="form-text text-muted">
                                                    Adjust the temperature to control the smoothness of predictions. Provide a value for temperature scaling.
                                                </small>
                                            </label>
                                            <input type="text" name="temperature" value="<?= $settings->temperature; ?>" class="form-control" id="temperatureControl" placeholder="Enter temperature">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div id="loading" class="loading-spinner"></div>
                                    <div id="response"></div>
                                </div>
                                <div class="col-12 text-right mt-3">
                                    <a id="updateSettingsBtn" class="btn btn-secondary">Upload Settings</a>
                                </div>
                            </form>
                        </div>
                        <script>
                            new HTTP().bindAjax({
                                btnID: 'updateSettingsBtn',
                                formID: 'updateSettingsForm',
                                extraParameters: '',
                                controllerRoute: 'UpdateSettings',
                                callbackFunction: function(response) {
                                    if (!response['err']) {
                                        window.location.href = "<?= Generic::baseURL(); ?>/model-setting";
                                    }
                                },
                                responseID: 'response',
                                loadingID: 'loading'
                            });
                        </script>

                    </div>
                </div>
            </div>
        </div>
    </div>