<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm mới</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="bg-primary header">
                <h3 class="text-light layer">
                    <span>ADMIN</span>
                </h3>
            </div>
            <div class="col-3" style="height: 700px;">
                <nav class="navbar navbar-light bg-light flex-column align-items-stretch p-3">
                    <a class="navbar-brand" href="">Quản lý</a>
                    <nav class="nav nav-pills flex-column">
                        <a class="nav-link" href="<?= BASE_DIR ?>?act=list-category">Quản lý loại hàng</a>
                        <a class="nav-link" href="<?= BASE_DIR ?>?act=list-product">Quản lý sản phẩm</a>
                        <a class="nav-link" href="<?= BASE_DIR ?>?act=list-productVariant">Quản lý sản phẩm biến thể</a>
                        <a class="nav-link" href="<?= BASE_DIR ?>?act=list-variant">Quản lý thuộc tính biến thể</a>
                        <a class="nav-link" href="<?= BASE_DIR ?>?act=list-order">Quản lý đơn hàng</a>
                        <a class="nav-link" href="<?= BASE_DIR ?>?act=product-chart">Thống kê</a>
                        <a class="nav-link" href="<?= BASE_URL ?>">Trang chủ</a>

                    </nav>
                </nav>
            </div>
            <div class="col-9">
                <div class="row justify-content-md-center">
                    <div class="col-7">
                        <h1>Sửa người dùng </h1>
                        <a href="<?= BASE_DIR ?>?act=list-user" class="btn btn-primary my-3">Quay lại</a><br>
                        <span style="color: red;"><?php echo $_SESSION['success'] ?? ''; ?></span>
                        <?php unset($_SESSION['success']); ?>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="mb-6">
                                <label for="username" class="form-label">User Name</label>
                                <input type="text" class="form-control" id="username" name="username"
                                    placeholder="Enter UserName" value="<?= $datao['username'] ?>">
                                <span style="color: red;"><?php echo $error['username'] ?? ''; ?></span>
                            </div>
                            <div class="mb-6 row my-4">
                                <label for="avatar" class="form-label">Avatar</label>
                                <input type="file" class="form-control" id="avatar" name="avatar">
                                <?php
                                if ($datao['avatar'] != "") {
                                    echo "<img src='" . IMG_PATH . $datao['avatar'] . "' width='100'>";
                                }
                                ?>
                            </div>
                            <div class="mb-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" name="email"
                                    placeholder="Enter Email" value="<?= $datao['email'] ?>">
                                <span style="color: red;"><?php echo $error['email'] ?? ''; ?></span>
                            </div>
                            <div class="mb-6">
                                <label for="password" class="form-label">Password</label>
                                <input type="text" class="form-control" id="password" name="password"
                                    placeholder="Enter Password" value="<?= $datao['password'] ?>">
                                <span style="color: red;"><?php echo $error['password'] ?? ''; ?></span>
                            </div>
                            <div class="mb-6">
                                <label for="navuser" class="form-label">Phân Quyền</label>
                                <select name="navuser" class="form-control">
                                    <option <?= $datao['role'] === 'admin' ? 'selected' : null ?> value="admin">Admin
                                    </option>
                                    <option <?= $datao['role'] === 'user' ? 'selected' : null ?> value="user">Member
                                    </option>
                                </select>
                            </div>
                            <button class="btn btn-success" name="btnUpdateUser" type="submit">Cập nhật</button>
                        </form>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="bg-warning ps-4 pt-3  footer" style="height: 60px; width: 100%;">
                    <h5 class="text-light">
                        @Copyright bootstrap
                    </h5>
                </div>
            </div>

        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
</body>

</html>