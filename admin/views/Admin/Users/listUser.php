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
                    <h1>Danh sách người dùng</h1>
                    <a href="<?= BASE_DIR ?>?act=add-user" class="btn btn-success my-3">Thêm mới</a><br>
                    <span style="color: red;"><?= $_SESSION['success'] ??''; ?></span>
                    <?php unset($_SESSION['success']); ?>
                    <table class="table table-striped table-hover text-center">
                        <thead class="table table-dark">
                            <th>ID</th>
                            <th>User Name</th>
                            <th>Avatar</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Acction</th>
                        </thead>
                        <tbody>
                            <?php foreach ($datav as $prov): ?>
                                <tr>
                                    <td><?= $prov['id'] ?></td>
                                    <td><?= $prov['username'] ?></td>
                                    <td>
                                        <?php
                                        if ($prov['avatar'] != "") {
                                            echo "<img src='" . IMG_PATH . $prov['avatar'] . "' width='80'>";
                                        }
                                        ?>
                                    </td>
                                    <td><?= $prov['email'] ?></td>
                                    <?php if ($prov['role'] === 'admin') { ?>
                                        <td class="text-danger">Admin</td>
                                    <?php } else { ?>
                                        <td class="text-primary">Member</td>
                                    <?php  } ?>



                                    <td>
                                        <a href="<?= BASE_DIR ?>?act=show-user&id=<?= $prov['id'] ?>" class="btn btn-info">Show</a>
                                        <a href="<?= BASE_DIR ?>?act=update-user&id=<?= $prov['id'] ?>" class="btn btn-warning">Sửa</a>
                                        <a onclick="return confirm(' Bạn có chắc muốn xóa người dùng này không?')"
                                            class="btn btn-danger"
                                            href="<?= BASE_DIR ?>?act=delete-user&id=<?= $prov['id'] ?>">Xóa</a>
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