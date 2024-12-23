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
            <div class="col-3" style="height: 100%x;">
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
                        <h1>Update Sản Phẩm</h1>
                        <a href="<?= BASE_DIR ?>?act=list-product" class="btn btn-primary my-3">Quay lại</a><br>
                        <span style="color: red;"><?php echo $_SESSION['success'] ?? ''; ?></span>
                        <?php unset($_SESSION['success']); ?>
                        <form action="" method="post" enctype="multipart/form-data">
                        <div class="mb-6">
                                <label for="category_id" class="form-label">Loại</label>
                                <select name="category_id" class="form-control">
                                    <?php foreach ($cate as $value): ?>
                                        <option value="<?= $value['id'] ?>"><?= $value['category_name'] ?></option>
                                    <?php endforeach; ?>

                                </select>
                            </div>
                            <div class="mb-6">
                                <label for="product_name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Tên sản phẩm" value="<?= $data['product_name'] ?>">
                                <span style="color: red;"><?php echo $error['product_name'] ?? ''; ?></span>
                            </div>
                            <div class="mb-6">
                                <label for="description" class="form-label">Mô tả</label>
                                <input type="text" class="form-control" id="description" name="description" placeholder="Mô tả chi tiết sản phẩm" value="<?= $data['description'] ?>">
                                <span style="color: red;"><?php echo $error['description'] ?? ''; ?></span>
                            </div>
                            <div class="mb-6">
                                <label for="image" class="form-label">Image</label><br>
                                <?php
                                if ($data['image'] != "") {
                                    echo "<img src='" . IMG_PATH . $data['image'] . "' width='60'> <br>";
                                }
                                ?>
                                <input type="file" class="form-control" id="image" name="image">
                            </div>
                            <div class="mb-6">
                                <label for="price" class="form-label">Giá sản phẩm</label>
                                <input type="text" class="form-control" id="price" name="price" placeholder="Giá bán sản phẩm" value="<?= $data['price'] ?>">
                                <span style="color: red;"><?php echo $error['price'] ?? ''; ?></span>
                            </div>
                            <div class="mb-6">
                                <label for="model" class="form-label">Thương hiệu</label>
                                <input type="text" class="form-control" id="model" name="model" placeholder="Thương hiệu sản phẩm" value="<?= $data['model'] ?>">
                                <span style="color: red;"><?php echo $error['model'] ?? ''; ?></span>
                            </div>
                            <div class="mb-6">
                                <label for="brand" class="form-label">Mẫu sản phẩm</label>
                                <input type="text" class="form-control" id="brand" name="brand" placeholder="Mẫu sản xuất của sản phẩm" value="<?= $data['brand'] ?>">
                                <span style="color: red;"><?php echo $error['brand'] ?? ''; ?></span>
                            </div>
                            <div class="mb-6">
                                <label for="color" class="form-label">Màu sản phẩm</label>
                                <input type="text" class="form-control" id="color" name="color" placeholder="Màu sản phẩm" value="<?= $data['color'] ?>">
                                <span style="color: red;"><?php echo $error['color'] ?? ''; ?></span>
                            </div>
                            <div class="mb-6">
                                <label for="material" class="form-label">Chất liệu dây</label>
                                <input type="text" class="form-control" id="material" name="material" placeholder="Chất liệu dây đeo của sản phẩm" value="<?= $data['material'] ?>">
                                <span style="color: red;"><?php echo $error['material'] ?? ''; ?></span>
                            </div>
                            <div class="mb-6">
                                <label for="water_resistant" class="form-label">Độ chống nước</label>
                                <input type="text" class="form-control" id="water_resistant" name="water_resistant" placeholder="Độ chống nước(50ml, 100ml,..." value="<?= $data['water_resistant'] ?>">
                                <span style="color: red;"><?php echo $error['water_resistant'] ?? ''; ?></span>
                            </div>
                            <div class="mb-6">
                                <label for="stock_quantity" class="form-label">Số lượng sản phẩm</label>
                                <input type="text" class="form-control" id="stock_quantity" name="stock_quantity" placeholder="Số lượng sản phẩm" value="<?= $data['stock_quantity'] ?>">
                                <span style="color: red;"><?php echo $error['stock_quantity'] ?? ''; ?></span>
                            </div>
                            <button class="btn btn-success" name="btnSendPros" type="submit">Cập Nhật</button>
                        </form>
                    </div>

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