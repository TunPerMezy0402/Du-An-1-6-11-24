<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
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
                        <h1>Update thuộc tính biến thể</h1>
                        <a href="<?= BASE_DIR ?>?act=list-variant" class="btn btn-primary my-3">Quay lại</a><br>
                        <span style="color: red;"><?php echo $_SESSION['success'] ?? ''; ?></span>
                        <?php unset($_SESSION['success']); ?>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="mb-6">
                                <label for="option_name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="option_name" name="option_name" placeholder="Tên thuộc tính" value="<?= $data['option_name'] ?>">
                                <span style="color: red;"><?php echo $error['option_name'] ?? ''; ?></span>
                            </div>
                            <div class="mb-6">
                                <label for="option_value" class="form-label">Chi tiết thuộc tính</label>
                                <input type="text" class="form-control" id="option_value" name="option_value" placeholder="Chi tiết thuộc tính" value="<?= $data['option_value'] ?>">
                                <span style="color: red;"><?php echo $error['option_value'] ?? ''; ?></span>
                            </div>
                            <button class="btn btn-success" name="btnSendVaris" type="submit">Cập Nhật</button>
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