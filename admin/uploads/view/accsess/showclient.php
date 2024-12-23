<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Success</title>
    <link rel="stylesheet" href="css/ss1.css">
</head>

<body>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Thông Tin Người Dùng</title>
        <link rel="stylesheet" href="styles.css">
    </head>

    <body>
        <div class="user-card">
            <div class="avatar">
            <?php 
                if (!empty($_SESSION['avatar'])) {
                    echo "<img src='" . BASE_URL_ADMIN . 'uploads/' . $_SESSION['avatar'] . "' width='100'>";
                } else {
                    echo "<img src='" . BASE_URL_ADMIN . 'uploads/user.gif' . "' width='100'>";
                }
            ?>
            </div>
            <div class="info">
                <h1 class="name"><?= $_SESSION['username'] ?></h1>
                <p class="email"> Email : <?= $_SESSION['email'] ?></p>
                <p class="password"> Mật Khẩu: <?= $_SESSION['pass'] ?>
                <p>
            </div>
            <a class="update-btn btn btn-primary" href="<?= BASE_URL . '?act=update-client' ?>">Cập nhật tài khoản</a>
        </div>
    </body>

    </html>

</body>

</html>