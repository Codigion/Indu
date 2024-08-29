</main>
<!-- End Content -->

<style>
    .contact-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        /* Keep space between items */
    }

    .contact-item {
        flex: 1;
        /* Allows the items to grow and fill the space */
        margin-right: 85px;
        /* Adds spacing between items */
        min-width: 200px;
        /* Ensures a minimum width for consistency */
        box-sizing: border-box;
        /* Prevents padding from affecting width */
    }

    .contact-item:last-child {
        margin-right: 0;
        /* Removes the right margin from the last item */
    }

    /* Responsive adjustments */
    @media (max-width: 767px) {
        .contact-item {
            margin-right: 0;
            /* Removes margin on smaller screens */
            margin-bottom: 20px;
            /* Adds space below each item on smaller screens */
        }

        .contact-container {
            flex-direction: column;
            /* Stacks items vertically on smaller screens */
        }
    }
</style>
<?php
$requestUri = basename($_SERVER['REQUEST_URI'])
?>
<!-- Footer -->
<footer class="footer">
    <div class="container">
        <div class="brand" style="font-size: 21px;font-weight:bold;"> Cow Identifier - ICAR-NDRI</div>
        <div class="row mt-30">
            <?php if ($requestUri != 'our-team') { ?>

                <!-- Contact Details -->
                <div class="col-md-12">
                    <div class="contact-container">
                        <!-- Left Contact Details -->
                        <div class="contact-item">
                            <h6 style="font-size:15px;font-weight:bolder;">Dr. Indu Devi, Scientist (LPM),</h6>
                            <p>Phone: <a href="tel:<?= PROJECT_PHONE ?>"><?= PROJECT_PHONE ?></a></p>
                            <p>Email: <a href="mailto:<?= PROJECT_EMAIL ?>"><?= PROJECT_EMAIL ?></a></p>
                            <p>Address: ICAR-NDRI, Karnal.</p>
                        </div>

                        <!-- Right Contact Details -->
                        <div class="contact-item">
                            <h6 style="font-size:15px;font-weight:bolder;">Naseeb Singh, Scientist (Farm Machinery and Power),</h6>
                            <p>Phone: <a href="tel:+918016243438">8016243438</a></p>
                            <p>Email: <a href="mailto:naseeb501@gmail.com">naseeb501@gmail.com</a></p>
                            <p>Address: Division of System Research & Engineering, ICAR RC-NEH Region, Umiam, Meghalaya, India - 793103</p>
                        </div>
                        <!-- <div class="contact-item">
                            <h6 style="font-size:15px;font-weight:bolder;">Dr. Vikas Vohra, PS & Head,</h6>
                            <p>Address: AGB Division, NDRI, Karnal</p>
                        </div>

                        <div class="contact-item">
                            <h6 style="font-size:15px;font-weight:bolder;">Dr. T. K. Mohanty, PS (ARGO),</h6>
                            <p>Address: LPM Division, NDRI, Karnal</p>
                        </div> -->
                    </div>

                </div>
            <?php } ?>
            <div class="col-md-2 col-xs-6">
                <h6>Quick Links</h6>
                <ul class="menu-footer mt-40">
                    <li><a href="<?php echo Generic::baseURL(); ?>">Home</a></li>
                    <li><a href="<?php echo Generic::baseURL(); ?>/about-us">About Us</a></li>
                    <li><a href="<?php echo Generic::baseURL(); ?>/contact-us">Contact</a></li>
                    <li><a href="<?php echo Generic::baseURL(); ?>/faq">F.A.Q.</a></li>
                    <li><a href="<?php echo Generic::baseURL(); ?>/our-team">Our Team</a></li>
                </ul>
            </div>
            <div class="col-md-2 col-xs-6">
                <h6>Site Links</h6>
                <ul class="menu-footer mt-40">
                    <li><a href="<?php echo Generic::baseURL(); ?>/terms-and-condition">Terms of Use</a></li>
                    <li><a href="<?php echo Generic::baseURL(); ?>/privacy">Privacy Policy</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom mt-10">
            <div class="row">
                <div class="col-md-6">
                    Copyright ©<?php echo date('Y'); ?>
                    <br />
                    <div style="font-size:10px">ICAR - National Dairy Research Institute, Karnal</div>
                </div>
                <!-- <div class="col-md-6 text-md-end text-start">
                    <div class="footer-social">
                        <a href="#!" class="icon-socials icon-facebook"></a>
                        <a href="#!" class="icon-socials icon-twitter"></a>
                        <a href="#!" class="icon-socials icon-instagram"></a>
                        <a href="#!" class="icon-socials icon-linkedin"></a>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</footer>
<!-- End Footer -->
<!-- Vendor JS-->
<script src="<?php echo Generic::baseURL(); ?>/Assets/js/vendor/modernizr-3.6.0.min.js"></script>
<script src="<?php echo Generic::baseURL(); ?>/Assets/js/vendor/jquery-3.6.0.min.js"></script>
<script src="<?php echo Generic::baseURL(); ?>/Assets/js/vendor/jquery-migrate-3.3.0.min.js"></script>
<script src="<?php echo Generic::baseURL(); ?>/Assets/js/vendor/bootstrap.bundle.min.js"></script>
<script src="<?php echo Generic::baseURL(); ?>/Assets/js/plugins/waypoints.js"></script>
<script src="<?php echo Generic::baseURL(); ?>/Assets/js/plugins/wow.js"></script>
<script src="<?php echo Generic::baseURL(); ?>/Assets/js/plugins/magnific-popup.js"></script>
<script src="<?php echo Generic::baseURL(); ?>/Assets/js/plugins/perfect-scrollbar.min.js"></script>
<script src="<?php echo Generic::baseURL(); ?>/Assets/js/plugins/select2.min.js"></script>
<script src="<?php echo Generic::baseURL(); ?>/Assets/js/plugins/isotope.js"></script>
<script src="<?php echo Generic::baseURL(); ?>/Assets/js/plugins/scrollup.js"></script>
<script src="<?php echo Generic::baseURL(); ?>/Assets/js/plugins/swiper-bundle.min.js"></script>
<!-- Template  JS -->
<script src="<?php echo Generic::baseURL(); ?>/Assets/js/main.js?v=1.0"></script>
</body>

</html>