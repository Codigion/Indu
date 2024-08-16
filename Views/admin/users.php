            <!-- Main Page -->
            <div class="main-panel">
                <div class="content-wrapper">

                    <!-- Table area Start -->
                    <div class="container-fluid"></div>

                    <div class="col-12">
                        <div class="card box-margin">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-20">
                                    <h6 class="card-title mb-0">Users</h6>
                                    <!-- <button type="button" class="btn btn-primary waves-effect waves-light float-right mb-3" data-toggle="modal" data-animation="bounce" data-target=".bs-example-modal-lg">+ Add New</button> -->
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon4">Q</span>
                                    </div>
                                    <input class="form-control" type="text" onkeyup="searchUser(this)" placeholder="Search .." />
                                    <script>
                                        function searchUser(event) {
                                            new HTTP().ajaxRequest(
                                                '',
                                                'search=' + event.value,
                                                'GetAllUsers',
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
                                                    <th>Name</th>
                                                    <th>No. Requests</th>
                                                    <th>Activities</th>
                                                </tr>
                                            </thead>
                                            <tbody id="dataArea"></tbody>

                                            <!-- <tbody>

                                                <tr>
                                                    <td>
                                                        <h4 class="h6 g-mb-2">01-01-2024 00:00</h4>
                                                    </td>
                                                    <td>
                                                        <h4 class="h6 g-mb-2">John Doe.</h4>
                                                    </td>
                                                    <td>
                                                        <h4 class="h6 g-mb-2">0</h4>
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-outline-primary btn-sm" href="<?php echo Generic::baseURL(); ?>/activities">
                                                            View Details
                                                        </a>
                                                    </td>
                                                </tr>
                                            </tbody> -->
                                        </table>
                                    </div>
                                    <!--End Basic Table-->
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>

            <script>
                new HTTP().ajaxRequest(
                    '',
                    '',
                    'GetAllUsers',
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
                            <td>` + item.timestamp + `</td>
                            <td>` + item.name +  `</td>
                            <td>` + item.no_requests + `</td>
                            <td>
                                <a class="btn btn-outline-primary btn-sm" href="<?php echo Generic::baseURL(); ?>/activities?id=` + item.user_id + `">
                                    View Details
                                </a>
                            </td>
                        </tr>
                    `);
                    });
                }
            </script>