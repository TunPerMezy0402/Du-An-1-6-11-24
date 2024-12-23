<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/client_css_ph47509.css">

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>

<body>
    <div class="container right-panel-active mt-3" id="container">

        <!-- Đăng Ký -->
        <div class="form-container sign-up-container">
            <form action="" method="POST">
                <h1>Đăng Ký</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span>or use your email for registration</span>
                <input class="mb-2" name="register_name" type="text" placeholder="Name" />
                <input class="mb-2" name="register_email" type="email" placeholder="Email" />
                <input name="register_pass" type="password" placeholder="Password" />
                <input class="btn_submit mt-4" type="submit" name="btn_register" value="Đăng Ký">

            </form>
        </div>

        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>To keep connected with us please login with your personal info</p>
                    <a class="login_style right-panel-active " href="<?= BASE_URL . '?act=go-login' ?>">Đăng Nhập</a>
                    <?php if (isset($_SESSION['errors'])): ?>
                        <div class="text-start mt-4">
                            <?php foreach ($_SESSION['errors'] as $error): ?>
                                <p class="p-error"><?= '*  ' . $error ?></p>
                            <?php endforeach ?>
                            <?php unset($_SESSION['errors']); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>