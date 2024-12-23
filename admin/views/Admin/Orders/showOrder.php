<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách</title>
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
                <div class="mb-6">
                    <h1>Show Đơn hàng</h1>
                    <a href="<?= BASE_DIR ?>?act=list-order" class="btn btn-primary my-3">Quay lại</a>
                    <table class="table table-striped table-hover text-center">
                        <thead class="table table-dark">
                            <th>Trường dữ liệu</th>
                            <th>Thông tin chi tiết</th>
                        </thead>
                        <tbody>
                            <?php foreach ($datao as $order => $value): ?>
                                <tr>
                                    <td><?= ucfirst($order) ?></td>
                                    <td>
                                        <?php
                                        switch ($order) {
                                            case 'payment_status':
                                                if ($value === 'unpaid') {
                                                    echo '<span class="text-warning">Chưa thanh toán</span>';
                                                } else if ($value === 'paid') {
                                                    echo '<span class="text-success">Đã thanh toán</span>';
                                                } else if ($value === 'refunded') {
                                                    echo '<span class="text-primary">Đã hoàn lại</span>';
                                                } else {
                                                    echo '<span class="text-danger">không thanh toán thành công</span>';
                                                }
                                                break;

                                            case 'shipping_status':
                                                if ($value === 'pending') {
                                                    echo '<span class="text-primary">Đang chờ xử lý</span>';
                                                } else if ($value === 'in_transit') {
                                                    echo '<span class="text-secondary">Đang vận chuyển</span>';
                                                } else if ($value === 'delivered') {
                                                    echo '<span class="text-success">Đã giao</span>';
                                                } else if ($value === 'returned') {
                                                    echo '<span class="text-primary">Đã trả lại</span>';
                                                } else {
                                                    echo '<span class="text-danger">Đã hủy</span>';
                                                }
                                                break;

                                            case 'payment_method':
                                                if ($value === 'credit_card') {
                                                    echo '<span class="text-success">Thẻ tín dụng</span>';
                                                } else if ($value === 'paypal') {
                                                    echo '<span class="text-success">Paypal</span>';
                                                } else if ($value === 'bank_transfer') {
                                                    echo '<span class="text-success">Thẻ ngân hàng</span>';
                                                } else {
                                                    echo '<span class="text-success">Tiền mặt khi giao hàng</span>';
                                                }
                                                break;

                                            default:
                                                echo $value;
                                                break;
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
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