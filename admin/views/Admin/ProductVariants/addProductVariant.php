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
                    <a class="nav-link" href="<?= BASE_DIR ?>?act=list-user">Quản lý Users</a>
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
                        <h1>Thêm mới Sản phẩm biến thể</h1>
                        <a href="<?= BASE_DIR ?>?act=list-productVariant" class="btn btn-primary my-3">Quay lại</a>
                        <span style="color: red;"><?php echo $error['success'] ?? ''; ?></span>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="mb-6">
                                <label for="product_id" class="form-label">Name Product</label>
                                <select name="product_id" class="form-control">
                                    <?php foreach ($product as $value): ?>
                                        <option value="<?= $value['id'] ?>"><?= $value['product_name'] ?></option>
                                    <?php endforeach; ?>

                                </select>
                            </div>
                            <div class="mb-6">
                                <label for="variant_id" class="form-label">Nmae Variant</label>
                                <select name="variant_id" class="form-control">
                                    <?php foreach ($vari as $value): ?>
                                        <option value="<?= $value['id'] ?>"><?= $value['option_name'] ?> <?= $value['option_value'] ?></option>
                                    <?php endforeach; ?>

                                </select>
                            </div>
                            <div class="mb-6">
                                <label for="sku" class="form-label">Mã Sku</label>
                                <input type="text" class="form-control" id="sku" name="sku" placeholder="Mã sku">
                                <span style="color: red;"><?php echo $error['sku'] ?? ''; ?></span>
                            </div>
                            <div class="mb-6">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" class="form-control" id="image" name="image">
                            </div>
                            <div class="mb-6">
                                <label for="price" class="form-label">Giá sản phẩm</label>
                                <input type="text" class="form-control" id="price" name="price"
                                    placeholder="Giá bán sản phẩm biến thể">
                                <span style="color: red;"><?php echo $error['price'] ?? ''; ?></span>
                            </div>
                            <div class="mb-6">
                                <label for="stock_quantity" class="form-label">Số lượng sản phẩm</label>
                                <input type="text" class="form-control" id="stock_quantity" name="stock_quantity"
                                    placeholder="Số lượng sản phẩm biến thể">
                                <span style="color: red;"><?php echo $error['stock_quantity'] ?? ''; ?></span>
                            </div>
                            <button class="btn btn-success" name="btnSendProv" type="submit">Thêm mới</button>
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