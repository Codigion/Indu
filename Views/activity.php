<main class="main">
    <section class="section-box bg-banner-about banner-home-3 pt-100">
        <div class="banner-hero">
            <div class="banner-inner">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="block-banner">
                            <h3 class="heading-banner text-center wow animate__animated animate__fadeInUp">Identify Cow</h3>
                            <p class="text-center">Capture a photo or select an image!</p>
                            <div class="form-find mw-720 mt-80">
                                <form class="wow animate__animated animate__fadeInUp">
                                    <div class="input-group">
                                        <input type="file" id="pictureInput" class="form-control mr-10 mr-md-3" accept="image/*" capture="camera">
                                        <a href="#!" onclick="triggerFileInput()" class="text-decoration-none"><i class="fa-solid fa-camera-retro mr-10" style="font-size: 40px;color:#060874;margin-top:6px;"></i></a>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 input-group  mr-10">
                                            <select class="form-select mr-10">
                                                <option>Model v1.0.0</option>
                                                <option>Model v1.2.0</option>
                                                <option>Model v2.1.0</option>
                                            </select>
                                        </div>
                                    </div>

                                    <a href="<?php echo Generic::baseURL(); ?>/activity" class="mt-10 btn btn-default btn-find wow animate__ animate__fadeInUp" style="visibility: visible; animation-name: fadeInUp; display: block; margin: 0 auto; text-align: center;">
                                        IDENTIFY COW
                                    </a>
                                </form>
                                <div class="card mt-4">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <span style="font-size:10px">Cow Picture Preview</span>
                                                <img src="<?php echo Generic::baseURL(); ?>/Assets/banner2.png" alt="" class="img-fluid">
                                            </div>
                                            <div class="col-md-6">
                                                <div class="table-responsive-sm">
                                                    <table class="table table-bordered">
                                                        <tr>
                                                            <th>Identified Cow ID:</th>
                                                            <td><strong># 0000</strong></td>
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