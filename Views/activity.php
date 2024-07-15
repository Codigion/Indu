<style>
    .table-bordered th,
    .table-bordered td {
        border-color: #007bff;
    }

    /* Responsive adjustments for smaller screens */
    @media (max-width: 768px) {
        .form-find .form-control {
            width: auto;
            /* Adjust width of file input on smaller screens */
            flex: 1;
            /* Use flexbox to make input and icon flexible */
        }

        .form-find .input-group {
            display: flex;
            /* Use flexbox for input and icon alignment */
            align-items: center;
            /* Center items vertically */
        }

        .form-find .btn-find {
            margin-top: 10px;
            /* Adjust margin for the Identify button */
        }
    }
</style>

<main class="main">
    <section class="section-box bg-banner-about banner-home-3 pt-100">
        <div class="banner-hero">
            <div class="banner-inner">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="block-banner">
                            <h3 class="heading-banner text-center wow animate__animated animate__fadeInUp">Snap Animal<br>Contactless photo Animal identification</h3>
                            <div class="form-find mw-720 mt-80">
                                <form class="wow animate__animated animate__fadeInUp">
                                    <div class="input-group">
                                        <input type="file" id="pictureInput" class="form-control mr-10 mr-md-3" accept="image/*" capture="camera">
                                        <a href="#" onclick="triggerFileInput()" class="text-decoration-none"><i class="fa-solid fa-camera-retro  mr-10" style="font-size: 53px;color:#060874;"></i></a>
                                    </div>

                                    <a href="<?php echo Generic::baseURL(); ?>/activity" class="btn btn-default btn-find wow animate__ animate__fadeInUp" style="visibility: visible; animation-name: fadeInUp; display: block; margin: 0 auto; text-align: center;">
                                        Identify
                                    </a>
                                </form>

                                <div class="card mt-4">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <img src="https://placehold.co/400x340" alt="" class="img-fluid">
                                            </div>
                                            <div class="col-md-6">
                                                <div class="table-responsive-sm">
                                                    <table class="table table-bordered">
                                                        <tr>
                                                            <th>Cow ID:</th>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Remarks:</th>
                                                            <td></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<script>
    function triggerFileInput() {
        document.getElementById('pictureInput').click();
    }
</script>