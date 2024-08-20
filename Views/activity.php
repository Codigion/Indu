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
</head>

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
                                        <div class="input-group">
                                            <input name="picture_original" type="file" id="pictureInput" class="form-control" accept="image/*" capture="camera">
                                            <a href="#!" onclick="triggerFileInput()" class="text-decoration-none">
                                                <i class="fa-solid fa-camera-retro" style="font-size: 40px; color: #060874; margin-top: 6px;"></i>
                                            </a>
                                        </div>
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
                                                    <span style="font-size:10px">Cow Picture Preview</span>
                                                    <img id="MUZZLE" src="<?php echo Generic::baseURL(); ?>/Assets/banner2.png" alt="" class="img-fluid">
                                                </div>
                                                <div class="col-md-6">
                                                    <table class="table table-bordered">
                                                        <tr>
                                                            <th>Identified Cow ID:</th>
                                                            <td><strong id="COW_ID"># 0000</strong></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Quality:</th>
                                                            <td><strong id="quality"></strong></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Temperature:</th>
                                                            <td><strong id="temperature"></strong></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Threshold:</th>
                                                            <td><strong id="threshold"></strong></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Confidence Score:</th>
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
        <script>
            function triggerFileInput() {
                document.getElementById('pictureInput').click();
            }

            function generateRandomHash(length = 12) {
                // Ensure the length is in bytes, not characters
                const array = new Uint8Array(length);
                window.crypto.getRandomValues(array);

                // Convert byte array to hexadecimal string
                const hashHex = Array.from(array).map(byte =>
                    byte.toString(16).padStart(2, '0')
                ).join('');

                return hashHex;
            }

            // Example usage
            var hashing = generateRandomHash()
            const url = '<?= Generic::baseURL() ?>/' + hashing + '.abc';
            const elementId = 'loadingText';
            const interval = 5000; // 5 seconds in milliseconds

            new HTTP().bindAjax({
                btnID: 'identifyCowBtn',
                formID: 'identifyCowForm',
                extraParameters: 'session_id=' + hashing,
                controllerRoute: 'IdentifyCow',
                callbackFunction: function(response) {
                    if (!response['err']) {
                        $('td strong#COW_ID').text('# ' + response['COW_ID']);
                        $('td strong#quality').text('# ' + response['quality']);
                        $('td strong#temperature').text('# ' + response['temperature']);
                        $('td strong#threshold').text('# ' + response['threshold']);
                        $('td strong#confidence_score').text('# ' + response['confidence_score']);
                        MUZZLE_IMAGE = '<?php echo Generic::baseURL(); ?>/Assets/uploads/COW_Picture/muzzle/' + response['MUZZLE'];
                        $('img#MUZZLE').attr('src', MUZZLE_IMAGE);
                        // Find the element by its ID and update its content
                        const element = document.getElementById(elementId);

                        if (element) {
                            element.textContent = '';
                        } else {
                            console.error(`Element with ID ${elementId} not found`);
                        }
                        // Update the progress bar width
                        const progressBar = document.getElementById('progress');
                        if (progressBar) {
                            progressBar.style.width = `100%`;
                        }

                    }
                },
                responseID: 'loadingText',
                loadingID: 'loading'
            });


            async function fetchAndDisplayContent(url, elementId) {
                try {
                    // Append a unique query parameter to the URL to prevent caching
                    const uniqueUrl = `${url}?t=${new Date().getTime()}`;

                    // Fetch the content from the server
                    const response = await fetch(uniqueUrl);
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }

                    // Get the text content from the response
                    const content = await response.text();

                    // Extract the percentage from the content
                    const percentageMatch = content.match(/(\d+)%/);
                    const percentage = percentageMatch ? percentageMatch[1] : '0';

                    // Find the element by its ID and update its content
                    const element = document.getElementById(elementId);

                    if (element) {
                        element.textContent = content;
                    } else {
                        console.error(`Element with ID ${elementId} not found`);
                    }

                    // Update the progress bar width
                    const progressBar = document.getElementById('progress');
                    if (progressBar) {
                        progressBar.style.width = `${percentage}%`;
                    }
                } catch (error) {
                    console.error('There was a problem with the fetch operation:', error);
                }
            }

            function startFetching(url, elementId, interval) {
                fetchAndDisplayContent(url, elementId); // Fetch immediately once
                setInterval(() => fetchAndDisplayContent(url, elementId), interval);
            }


            startFetching(url, elementId, interval);
        </script>