<!-- Main Page -->
<div class="main-panel">
    <div class="content-wrapper">

        <!-- Table area Start -->
        <div class="container-fluid"></div>

        <div class="col-12">
            <div class="card box-margin">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-20">
                        <h6 class="card-title mb-0">Database</h6>
                        <a href="<?= Generic::baseURL(); ?>/failed-database" class="btn btn-secondary  float-right mb-3">Failed Request</a>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon4">Q</span>
                        </div>
                        <input class="form-control" type="text" onkeyup="searchDatabase(this)" placeholder="Search.." />
                        <script>
                            function searchDatabase(event) {
                                new HTTP().ajaxRequest(
                                    '',
                                    'search=' + event.value,
                                    'GetAllDatabase',
                                    function(response) {
                                        $("#dataArea").html('');


                                        if (!response['err']) {
                                            setData(response['dat'])
                                        } else {
                                            $("#dataArea").html('<tr><th colspan="6">No results found.</th></tr>')
                                        }
                                    },
                                    'x',
                                    'x'
                                );
                            }
                        </script>
                    </div>
                    <div class="basic-table-area">
                        <!--Basic Table-->
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="text-uppercase">
                                    <tr>
                                        <th>Timestamp</th>
                                        <th>Model Name / Version</th>
                                        <th>Threshold / Temperature / Confidence Score</th>
                                        <th>Cow Picture</th>
                                        <th>Quality</th>
                                        <th>User Name</th>
                                        <th>Cow Muzzle</th>
                                        <th>Cow ID</th>
                                    </tr>
                                </thead>
                                <tbody id="dataArea"></tbody>

                            </table>
                        </div>
                        <!--End Basic Table-->
                    </div>

                </div>
            </div>
        </div>
    </div>


    <script>
        new HTTP().ajaxRequest(
            '',
            '',
            'GetAllDatabase',
            function(response) {

                if (!response['err']) {
                    setData(response['dat'])
                } else {
                    $("#dataArea").html('<tr><th colspan="6">No results found.</th></tr>')
                }
            },
            'x',
            'x'
        );

        function setData(data) {
            data.forEach(function(item) {
                let quantityColor = '';
                // if (parseInt(item.available_quantity) <= parseInt(item.re_order_level))
                //     quantityColor = 'text-danger';

                $("#dataArea").append(`
                        <tr>
                            <td>` + item.created_at + `</td>
                            <td>` + item.model_name + ` / ` + item.model_version + `</td>
                            <td>
                                <div class="row">
                                    <div class="col-4">
                                        <strong>Threshold:</strong><br>` + item.threshold + ` 
                                    </div>
                                    <div class="col-4">
                                        <strong>Temperature:</strong><br> ` + item.temperature + `
                                    </div>
                                    <div class="col-4">
                                        <strong>Confidence Score:</strong><br>` + item.confidence_score + `
                                    </div>
                                </div>
                            </td>
                            <td><a target="_blank" href="<?= Generic::baseURL(); ?>/Assets/uploads/COW_Picture/` + item.picture_orginal + `"/>Picture  </a> </td>
                            <td class="` + quantityColor + `">` + item.quality + `</td>
                            <td>` + item.user_name + `</td>
                            <td> <a target="_blank" href="<?= Generic::baseURL(); ?>/Assets/uploads/COW_Picture/muzzle/` + item.picture_muzzle + `"/> Picture  </a> </td>
                            <td>#` + item.cow_id + `</td>
                        </tr>
                    `);
            });
        }
    </script>