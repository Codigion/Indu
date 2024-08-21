<style>
    .form-find {
        margin: 80px auto;
        padding: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .input-group {
        display: flex;
        justify-content: space-between;
        margin-bottom: 20px;
        align-items: center;
    }

    .btn-find {
        display: block;
        width: 100%;
        text-align: center;
    }

    .card {
        margin-top: 20px;
        display: flex;
        justify-content: space-between;
    }

    .loading-container {
        width: 100%;
        max-width: 400px;
        margin: 20px auto;
        text-align: center;
    }

    .loading-text,
    .progress-bar {
        font-size: 18px;
        margin-bottom: 10px;
    }

    .progress-bar {
        width: 100%;
        height: 20px;
        background-color: #f3f3f3;
        border-radius: 10px;
        overflow: hidden;
    }

    .progress {
        height: 100%;
        width: 0%;
        background-color: #3498db;
        transition: width 0.5s ease;
    }

    .banner-hero .block-banner .form-find form {
        display: grid;
        width: 100% !important;
    }
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

</head>
<style>
    /* Ensure icons are aligned with the text */
    .info-label {
        display: flex;
        align-items: center;
        /* Vertically centers the text and icon */
    }

    .info-icon {
        margin-left: 5px;
        color: #6c757d;
        cursor: pointer;
        font-size: 1.2em;
        /* Slightly larger icon for easier tapping */
    }

    /* Increase clickable area without affecting layout */
    .info-label {
        padding: 5px;
        position: relative;
    }

    /* Responsive adjustments for smaller screens */
    @media (max-width: 576px) {

        .table th,
        .table td {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            width: 100%;
        }

        .info-label {
            justify-content: space-between;
            /* Space the text and icon evenly on small screens */
            width: 100%;
        }
    }
</style>

<body>
    <main class="main">
        <section class="section-box bg-banner-about banner-home-3 pt-100">
            <div class="banner-hero">
                <div class="banner-inner">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="block-banner">
                                <h3 class="heading-banner text-center">Identify Cow</h3>
                                <p class="text-center">Capture a photo or select an image!</p>
                                <div class="form-find">
                                    <form id="identifyCowForm">
                                        <label><strong>Choose / Take Picture of Cow <small>(Pre-Trained)</small></strong></label>
                                        <div class="input-group">
                                            <input name="picture_original" type="file" id="pictureInput" class="form-control" accept="image/*" capture="camera" style="margin-right:10px;">
                                            <a href="#!" onclick="triggerFileInput()" class="text-decoration-none">
                                                <i class="fa-solid fa-camera-retro" style="font-size: 40px; color: #060874; margin-top: -3px;"></i>
                                            </a>
                                        </div>
                                        <div style="margin-top:-15px;margin-bottom:20px;font-size:11px;"><small>Note: Please make sure the entire cow is visible and the image quality is clear.</small></div>

                                        <label><strong>Choose Appropriate Model <small>(or, use default)</small></strong></label>
                                        </select>
                                        <div class="input-group">
                                            <select name="model_version" class="form-select">
                                                <?php foreach ($models as $model) : ?>
                                                    <option value="<?= $model->id; ?>"><?= $model->name; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <a id="identifyCowBtn" href="<?php echo Generic::baseURL(); ?>/activity" class="btn btn-default btn-find">
                                            IDENTIFY COW
                                        </a>
                                        <div class="loading-container">
                                            <div id="loadingText" class="loading-text"></div>
                                            <div class="progress-bar">
                                                <div id="progress" class="progress"></div>
                                            </div>
                                        </div>
                                        <div id="response"></div>
                                    </form>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <span style="font-size:10px">Extracted Cow's Muzzle Preview</span>
                                                    <img id="MUZZLE" src="<?php echo Generic::baseURL(); ?>/Assets/banner2.png" alt="" class="img-fluid">
                                                </div>
                                                <div class="col-md-6">
                                                    <h5>Cow Identification Details:</h5>
                                                    <table class="table table-bordered" style="margin: 6px;">
                                                        <tr>
                                                            <th>
                                                                <div class="info-label">
                                                                    Orginal Cow's Picture:
                                                                </div>
                                                            </th>
                                                            <td><strong id="ORGINAL"></strong></td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <div class="info-label">
                                                                    Identified Cow ID:
                                                                    <i class="fas fa-info-circle info-icon" data-toggle="tooltip" title="This helps to get the ID of the cow using the cow's nose, which corresponds to the cow ID."></i>
                                                                </div>
                                                            </th>
                                                            <td><strong id="COW_ID"># 0000</strong></td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <div class="info-label">
                                                                    Quality:
                                                                    <i class="fas fa-info-circle info-icon" data-toggle="tooltip" title="Determined by the given picture, including the quality of the image, muzzle box, confidence score, etc."></i>
                                                                </div>
                                                            </th>
                                                            <td><strong id="quality"></strong></td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <div class="info-label">
                                                                    Temperature:
                                                                    <i class="fas fa-info-circle info-icon" data-toggle="tooltip" title="This is a setting parameter that helps AI as a hyperparameter to control the randomness of responses."></i>
                                                                </div>
                                                            </th>
                                                            <td><strong id="temperature"></strong></td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <div class="info-label">
                                                                    Threshold:
                                                                    <i class="fas fa-info-circle info-icon" data-toggle="tooltip" title="A setting parameter between 0.3 to 1.0 that defines the level of confidence score we are expecting."></i>
                                                                </div>
                                                            </th>
                                                            <td><strong id="threshold"></strong></td>
                                                        </tr>
                                                        <tr>
                                                            <th>
                                                                <div class="info-label">
                                                                    Confidence Score:
                                                                    <i class="fas fa-info-circle info-icon" data-toggle="tooltip" title="Indicates how strong the prediction is, such as Cow ID, with a score between 0.1 to 1.0. Note: This does not reflect accuracy."></i>
                                                                </div>
                                                            </th>
                                                            <td><strong id="confidence_score"></strong></td>
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
        </section>

        <!-- Modal Structure -->
        <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="imageModalLabel">Original Cow's Picture</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <img id="modalImage" src="" alt="Cow Picture" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(function() {
                $('[data-toggle="tooltip"]').tooltip({
                    trigger: 'click', // Adjust trigger to 'click' for better experience on mobile
                    placement: 'auto', // Automatically adjusts the tooltip position based on screen space
                    html: true, // Allows for richer content inside tooltips if needed
                    boundary: 'window' // Ensures the tooltip stays within the viewport
                });
            });

            let fetchInterval; // Global variable to hold the interval ID

            function triggerFileInput() {
                document.getElementById('pictureInput').click();
            }

            function generateRandomHash(length = 12) {
                const array = new Uint8Array(length);
                window.crypto.getRandomValues(array);

                const hashHex = Array.from(array).map(byte =>
                    byte.toString(16).padStart(2, '0')
                ).join('');

                return hashHex + '.abc';
            }

            // Example usage
            var hashing = generateRandomHash();
            const url = '<?= Generic::baseURL() ?>/' + hashing;
            const elementId = 'loadingText';
            const interval = 5000; // 5 seconds in milliseconds

            function startFetching(url, elementId, interval) {
                fetchAndDisplayContent(url, elementId); // Fetch immediately once
                fetchInterval = setInterval(() => fetchAndDisplayContent(url, elementId), interval);
            }

            function stopFetching() {
                clearInterval(fetchInterval); // Stop the interval
            }

            async function fetchAndDisplayContent(url, elementId) {
                try {
                    const uniqueUrl = `${url}?t=${new Date().getTime()}`;
                    const response = await fetch(uniqueUrl);
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }

                    const content = await response.text();
                    const percentageMatch = content.match(/(\d+)%/);
                    const percentage = percentageMatch ? percentageMatch[1] : '0';

                    const element = document.getElementById(elementId);

                    if (element) {
                        element.textContent = content;
                    } else {
                        console.error(`Element with ID ${elementId} not found`);
                    }

                    const progressBar = document.getElementById('progress');
                    if (progressBar) {
                        progressBar.style.width = `${percentage}%`;
                    }
                } catch (error) {
                    console.error('There was a problem with the fetch operation:', error);
                }
            }

            // Modify the HTTP bindAjax callback to start and stop fetching
            new HTTP().bindAjax({
                btnID: 'identifyCowBtn',
                formID: 'identifyCowForm',
                extraParameters: 'session_id=' + hashing,
                controllerRoute: 'IdentifyCow',
                callbackFunction: function(response) {
                    if (!response['err']) {
                        // Populate the table with the response data
                        $('td strong#COW_ID').text('# ' + response['COW_ID']);
                        $('td strong#quality').text('# ' + response['quality']);
                        $('td strong#temperature').text('# ' + response['temperature']);
                        $('td strong#threshold').text('# ' + response['threshold']);
                        $('td strong#confidence_score').text('# ' + response['confidence_score']);
                        MUZZLE_IMAGE = '<?php echo Generic::baseURL(); ?>/Assets/uploads/COW_Picture/muzzle/' + response['MUZZLE'];
                        ORGINAL_IMAGE = '<?php echo Generic::baseURL(); ?>/Assets/uploads/COW_Picture/' + response['ORGINAL'];
                        $('img#MUZZLE').attr('src', MUZZLE_IMAGE);
                        $('td strong#ORGINAL').html('<a href="#" id="openModal">View</a>');

                        // When the link is clicked, show the modal with the image
                        $('td strong#ORGINAL a#openModal').on('click', function(e) {
                            e.preventDefault(); // Prevent the default link behavior
                            $('#modalImage').attr('src', ORGINAL_IMAGE); // Set the image source
                            $('#imageModal').modal('show'); // Show the modal
                        });

                        const element = document.getElementById(elementId);
                        if (element) {
                            element.textContent = '';
                        }

                        const progressBar = document.getElementById('progress');
                        if (progressBar) {
                            progressBar.style.width = `100%`;
                        }
                        stopFetching(); // Stop fetching if there's an error
                    } else {
                        stopFetching(); // Stop fetching if there's an error
                        console.error('Error in response:', response['err']);
                    }
                },
                responseID: 'loadingText',
                loadingID: 'loading'
            });

            // Trigger fetching when the button is clicked
            document.getElementById('identifyCowBtn').addEventListener('click', function() {
                startFetching(url, elementId, interval); // Start fetching when the button is clicked
            });
        </script>