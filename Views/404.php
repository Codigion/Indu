<style>
    body,
    html {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
    }

    .error-title {
        font-size: 96px;
        color: #ff6b6b;
        margin-bottom: 20px;
    }

    .error-message {
        font-size: 24px;
        margin-bottom: 10px;
        color: #333;
    }

    .description {
        font-size: 18px;
        color: #777;
        margin-bottom: 30px;
    }

    .btn-find {
        display: block;
        margin: 10px auto;
        padding: 10px 20px;
        text-decoration: none;
        border-radius: 5px;
        color: #fff;
        font-size: 16px;
        transition: background-color 0.3s ease;
    }

    .btn-primary {
        background-color: #007bff;
    }

    .btn-secondary {
        background-color: #6c757d;
    }

    .btn-find:hover {
        background-color: #0056b3;
    }

    .loading-container {
        margin-top: 30px;
        text-align: center;
    }

    .loading-text {
        font-size: 18px;
        margin-bottom: 10px;
    }
    .banner-hero {
        padding: 163px 76px 148px 18px;
    }
</style>
<div class="container">
    <main class="main">
        <section class="section-box">
            <div class="banner-hero">
                <div class="banner-inner text-center">
                    <h1 class="error-title">404</h1>
                    <p class="error-message">Oops! The page you're looking for doesn't exist.</p>
                    <p class="description">Don't worry! Here are some useful links to help you get back on track:</p>
                    <div class="form-find">
                        <a href="<?= Generic::baseURL(); ?>" class="btn btn-primary btn-find">Go to Homepage</a>
                        <a href="<?= Generic::baseURL(); ?>/contact-us" class="btn btn-secondary btn-find">Contact Us</a>
                    </div>

                </div>
            </div>
        </section>
    </main>
</div>