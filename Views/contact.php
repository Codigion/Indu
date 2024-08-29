<style>
    /* Container for Flexbox layout */
    .contact-container {
        display: flex;
        flex-wrap: wrap;
        /* Wraps items if needed */
        gap: 20px;
        /* Adds spacing between items */
    }

    /* Each contact item */
    .contact-item {
        flex: 1;
        /* Allows items to grow and fill the space */
        min-width: 0;
        /* Prevents items from shrinking too much */
    }

    /* Add bottom margin to the last contact item */
    .contact-item:last-child {
        margin-bottom: 40px;
        /* Adds space below the last contact item */
    }

    /* Responsive adjustments for mobile */
    @media (max-width: 767px) {
        .contact-item {
            flex: 1 1 100%;
            /* Full width on mobile screens */
            margin-right: 0;
            /* Removes margin on smaller screens */
            margin-bottom: 20px;
            /* Adds space below each item on smaller screens */
        }

        /* Ensure bottom spacing is maintained on mobile */
        .contact-container {
            margin-bottom: 40px;
            /* Adds space below the container on mobile screens */
        }
    }
</style>

<!-- Content -->
<main class="main">
    <section class="section-box">
        <div class="container pt-50">
            <div class="w-50 w-md-100 ">
                <h1 class="section-title-large mb-30 wow animate__animated animate__fadeInUp">Contact Us</h1>
            </div>
        </div>
    </section>
    <div class="container mt-90 mt-md-30">
        <div class="contact-container row">
            <!-- Left Contact Details -->
            <div class="contact-item col-xl-6 col-lg-12 mb-4">
                <h4>Dr. Indu Devi, Scientist (LPM)</h4>
                <div class="mt-30">
                    <h5>Phone: &nbsp;<a href="tel:<?= PROJECT_PHONE ?>"><?= PROJECT_PHONE ?></a></h5>
                    <h5>Email: &nbsp;&nbsp;<a href="mailto:<?= PROJECT_EMAIL ?>"><?= PROJECT_EMAIL ?></a></h5>
                    <h5>Address: <?= PROJECT_ADDRESS ?></h5>
                </div>
            </div>
        </div>
    </div>
    <!-- Optional additional space below -->
    <div class="container mt-90">
        <!-- Add any additional content or just a spacer -->
    </div>
</main>
<!-- End Content -->