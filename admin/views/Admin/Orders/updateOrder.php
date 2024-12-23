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
                        <h1>Update thuộc đơn hàng</h1>
                        <a href="<?= BASE_DIR ?>?act=list-order" class="btn btn-primary my-3">Quay lại</a><br>
                        <span style="color: red;"><?php echo $_SESSION['success'] ?? ''; ?></span>
                        <?php unset($_SESSION['success']); ?>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="mb-6">
                                <label for="payment_status" class="form-label">Trạng thái thanh toán</label>
                                <select name="payment_status" class="form-control">
                                    <option value="<?= $data['payment_status'] ?>">
                                        <?php
                                        if ($data['payment_status'] === 'unpaid') {
                                            echo 'Chưa thanh toán';
                                        } else if ($data['payment_status'] === 'paid') {
                                            echo 'Đã thanh toán';
                                        } else if ($data['payment_status'] === 'refunded') {
                                            echo 'Đã hoàn lại';
                                        } else if ($data['payment_status'] === 'failed') {
                                            echo 'không thanh toán thành công';
                                        }
                                        ?>
                                    </option>
                                    <option value="unpaid">Chưa thanh toán
                                    </option>
                                    <option value="paid">Đã thanh toán
                                    </option>
                                    <option value="refunded">Đã hoàn lại
                                    </option>
                                    <option value="failed">không thanh toán thành công
                                    </option>
                                </select>
                                <span style="color: red;"><?php echo $error['payment_status'] ?? ''; ?></span>
                            </div>
                            <div class="mb-6">
                                <label for="shipping_status" class="form-label">Trạng thái giao vận</label>
                                <select name="shipping_status" class="form-control">
                                    <option value="<?= $data['shipping_status'] ?>">
                                        <?php
                                        if ($data['shipping_status'] === 'pending') {
                                            echo 'Đang chờ xử lý';
                                        } else if ($data['shipping_status'] === 'in_transit') {
                                            echo 'Đang vận chuyển';
                                        } else if ($data['shipping_status'] === 'delivered') {
                                            echo 'Đã giao';
                                        } else if ($data['shipping_status'] === 'returned') {
                                            echo 'Đã trả lại';
                                        } else if ($data['shipping_status'] === 'cancelled') {
                                            echo 'Đã hủy';
                                        }
                                        ?>
                                    </option>
                                    <option value="pending">Đang chờ xử lý
                                    </option>
                                    <option value="in_transit">Đang vận chuyển
                                    </option>
                                    <option value="delivered">Đã giao
                                    </option>
                                    <option value="returned">Đã trả lại
                                    </option>
                                    <option value="cancelled">Đã hủy
                                    </option>
                                </select>
                                <span style="color: red;"><?php echo $error['shipping_status'] ?? ''; ?></span>
                            </div>
                            <!--                             
                            <div class="mb-6">
                                <label for="payment_method" class="form-label">Phương thức thanh toán</label>
                                <select name="payment_method" class="form-control">
                                    <option value="<?= $data['payment_method'] ?>"><?= $data['payment_method'] ?>
                                    </option>
                                    <option value="credit_card">credit_card
                                    </option>
                                    <option value="paypal">paypal
                                    </option>
                                    <option value="bank_transfer">bank_transfer
                                    </option>
                                    <option value="cash_on_delivery">cash_on_delivery
                                    </option>
                                </select>
                            </div> -->

                            <button class="btn btn-success" name="btnSendOrder" type="submit">Cập Nhật</button>
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