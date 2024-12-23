<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dự án 1</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/css.css">
    <link rel="stylesheet" href="css/css2.css">
    <script src="https://kit.fontawesome.com/509cc166d7.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>
    <div class="boxcenter">
        <!-- BIGIN HEADER -->
        <header>
            <div class="header-logo">
                <a href=""><img src="img/img_profile/logo.jpg" alt="Chưa Có Ảnh"></a>
                <div class="accsess-user">

                    <?php
                        if(!isset($_SESSION['avatar'])) {
                            echo "<img src='" . BASE_URL . 'img/img_profile/user.gif' . "' alt='Chưa cập nhật ảnh' />";
                        } else {
                            echo "<img src='" . BASE_URL_ADMIN . 'uploads/'. $_SESSION['avatar'] . "' alt='Chưa cập nhật ảnh' />";
                        }
                    ?>
                    <div class="ml15 mt-2 account-accsess">
                        <?php if (isset($_SESSION['username']) && $_SESSION['username'] != '') { ?>
                            <h6 class="hi-header">Xin chào <?php echo $_SESSION['username']; ?></h6>
                            <div class="true-accsess">
                                <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') { ?>
                                    <a href="<?= BASE_URL_ADMIN ?>">Trang Quản Trị</a>
                                <?php } ?>
                                <a href="?act=show-client">Thông Tin Tài Khoản</a>
                                <a href="">Đơn Mua</a>
                                <a href="?act=go-logout">Đăng Xuất</a>
                            </div>
                        <?php } else { ?>
                            <div class="false-accsess">
                                <a href="?act=go-login">Đăng Nhập</a>
                                <a href="?act=go-register">Đăng Ký</a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>

            <nav>
                <ul class="menu">
                    <li class="mr25">
                        <a class="mr25" href="index.php">TRANG CHỦ</a>
                    </li>
                    <li class="mr25">
                        <a class="mr25" href="#">SẢN PHẦM</a>
                    </li>
                    <li class="mr25">
                        <a class="mr25" href="#">NHÃN HÀNG</a>
                    </li>
                    <li class="mr25">
                        <a class="mr25" href="?act=gioithieu">GIỚI THIỆU</a>
                    </li>
                    <li class="mr25">
                        <a class="mr25" href="?act=lienhe">LIÊN HỆ</a>
                    </li>
                </ul>
        
                <ul class="bottom-user">
                    <li>
                        <label class="pr20 search" for="search">
                            <input class="input-search" type="search" placeholder="Search">
                            <a for="search" href="#">
                                <i class="ml20 fa-solid fa-magnifying-glass"></i>
                            </a>
                        </label>
                    </li>
                    <li id="boxcart" class="border-user-header"><a href="index.php?act=addtocart"><i class="fa-solid fa-bag-shopping"></i><span></span></a></li>
                    <li class="pl20"><a href="#"><i class="fa-solid fa-bell"></i></a></li>
                </ul>
            </nav>
        </header>
    <!-- END HEADER -->