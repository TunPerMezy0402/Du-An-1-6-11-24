<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập Nhật Thông Tin</title>
    <link rel="stylesheet" href="css/ss2.css">
</head>

<body>
    <div class="user-card2">
        <?php if (isset($_SESSION['success'])): ?>
            <div class="alert alert-success">
                <?= $_SESSION['success'] ?>
            </div>
            <?php unset($_SESSION['success']); ?>
        <?php endif; ?>
        <div class="avatar">
            <?php 
                if (!empty($_SESSION['avatar'])) {
                    echo "<img src='" . BASE_URL_ADMIN . 'uploads/' . $_SESSION['avatar'] . "' width='100'>";
                } else {
                    echo "<img src='" . BASE_URL_ADMIN . 'uploads/user.gif' . "' width='100'>";
                }
            ?>
        </div>
        <div class="info2">
            <h1 class="title">Cập Nhật Tài Khoản</h1>
            <form class="update2-form" method="POST" enctype="multipart/form-data">
                <div class="display-bl mb-6">
                    <label for="username" class="form-label">User Name</label>
                    <input type="text" class="form-control text-start" id="username" name="username" placeholder="Enter UserName" value="<?= $_SESSION['username'] ?>">
                    <span style="color: red;"><?php echo $error['username'] ?? ''; ?></span>
                </div>
                <div class="display-bl mb-6 row my-4">
                    <label for="avatar" class="form-label">Avatar</label>
                    <input type="file" class="form-control text-start" id="avatar" name="avatar">
                </div>
                <div class="display-bl mb-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control text-start" id="email" name="email"
                        placeholder="Enter Email" value="<?= $_SESSION['email'] ?>">
                    <span style="color: red;"><?php echo $error['email'] ?? ''; ?></span>
                </div>
                <div class="display-bl mb-6">
                    <label for="password" class="form-label">Password</label>
                    <input type="text" class="form-control text-start" id="password" name="password"
                        placeholder="Enter Password" value="<?= $_SESSION['pass'] ?>">
                    <span style="color: red;"><?php echo $error['password'] ?? ''; ?></span>
                </div>
                <input type="submit" name="update-btn-client" class="update-btn mt5" value="Lưu Thay Đối">
            </form>
        </div>
    </div>
</body>

</html>
<? 
echo $_SESSION['id'];
?>