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
                    <h1>Danh sách Đơn hàng</h1>
                    <table class="table table-striped table-hover">
                        <thead class="table table-dark">
                            <th>ID</th>
                            <th>Tên khách hàng</th>
                            <th>Số điện thoại</th>
                            <th>Địa chỉ</th>
                            <th>Order Date</th>
                            <th>Trạng thái thanh toán</th>
                            <th>Trạng thái giao vận</th>
                            <th>Tổng giá đơn hàng</th>
                            <th>Hình thức thanh toán</th>
                            <th>Products</th>
                            <th>Total Quantity</th>
                            <th>Thao tác</th>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $order): ?>
                                <tr>
                                    <td><?= $order['order_id'] ?></td>
                                    <td><?= $order['customer_name'] ?></td>
                                    <td><?= $order['customer_phone'] ?></td>
                                    <td><?= $order['shipping_address'] ?></td>
                                    <td><?= $order['order_date'] ?></td>
                                    <?php if ($order['payment_status'] === 'unpaid') { ?>
                                        <td class="text-warning">Chưa thanh toán</td>
                                    <?php } else if ($order['payment_status'] === 'paid') { ?>
                                            <td class="text-success">Đã thanh toán</td>
                                    <?php } else if ($order['payment_status'] === 'refunded') { ?>
                                                <td class="text-primary">Đã hoàn lại</td>
                                    <?php } else { ?>
                                                <td class="text-danger">không thanh toán thành công</td>
                                    <?php } ?>
                                    
                                    <?php if ($order['shipping_status'] === 'pending') { ?>
                                        <td class="text-primary">Đang chờ xử lý</td>
                                    <?php } else if ($order['shipping_status'] === 'in_transit') { ?>
                                            <td class="text-secondary">Đang vận chuyển</td>
                                    <?php } else if ($order['shipping_status'] === 'delivered') { ?>
                                                <td class="text-success">Đã giao</td>
                                    <?php } else if ($order['shipping_status'] === 'returned') { ?>
                                                    <td class="text-primary">Đã trả lại</td>
                                    <?php } else { ?>
                                                    <td class="text-danger">Đã hủy</td>
                                    <?php } ?>

                                    <td><?= $order['total_amount'] ?></td>
                                    <?php if ($order['payment_method'] === 'credit_card') { ?>
                                        <td class="text-success">Thẻ tín dụng</td>
                                    <?php } else if ($order['payment_method'] === 'paypal') { ?>
                                            <td class="text-success">Paypal</td>
                                    <?php } else if ($order['payment_method'] === 'bank_transfer') { ?>
                                                <td class="text-success">Thẻ ngân hàng</td>
                                    <?php } else { ?>
                                                <td class="text-success">Tiền mặt khi giao hàng</td>
                                    <?php } ?>
                                    <td><?= nl2br(str_replace(',', '<br>', $order['product_names'])) ?></td>
                                    <td><?= $order['total_quantity'] ?></td>
                                    <td>
                                        <a href="<?= BASE_DIR ?>?act=show-order&id=<?= $order['order_id'] ?>"
                                            class="btn btn-info">Show</a>
                                        <a href="<?= BASE_DIR ?>?act=update-order&id=<?= $order['order_id'] ?>"
                                            class="btn btn-warning">Sửa</a>

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