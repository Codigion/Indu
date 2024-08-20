<!-- Main Page -->
<div class="main-panel">
    <div class="content-wrapper">

        <!-- Table area Start -->
        <div class="container-fluid"></div>

        <div class="col-12">
            <div class="card box-margin">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-20">
                        <h6 class="card-title mb-0">Failed Database</h6>
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
                                    'GetAllDatabaseFailed',
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
                                        <th>User Name</th>
                                        <th>Model Name / Version</th>
                                        <th>Cow Picture</th>
                                        <th>Error</th>
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
            'GetAllDatabaseFailed',
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
                            <td>` + item.user_name + `</td>
                            <td>` + item.model_name + ` / ` + item.model_version +  `</td>
                            <td><a target="_blank" href="<?= Generic::baseURL(); ?>/Assets/uploads/COW_Picture/` + item.picture_orginal + `"/>Picture  </a> </td>
                            <td>` + item.error + `</td>
                        </tr>
                    `);
            });
        }
    </script>