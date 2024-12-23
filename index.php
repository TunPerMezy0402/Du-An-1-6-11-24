<?php
session_start();

/* Start Tuấn Anh */
require_once './common/env.php';
require_once './common/connect-db.php';
require_once './common/helper.php';

require_once './common/model.php';
/* End Tuấn Anh */


include "model/pdo.php";
include "controller/accountController.php";
include "model/accountModel.php";
include "model/products.php";
include "model/taikhoan.php";
include "model/cart.php";
include "model/sanpham.php";
include "model/binhluan.php";
include "view/header.php";
include "global.php";
if (!isset($_SESSION['mycart']))
    $_SESSION['mycart'] = [];
$spnew = loadall_products_home();
$dstop10 = loadall_products_top10();
$dssp = loadall_products();
if (isset($_GET['act']) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
            //==================== CONTROLLER SẢN PHẨM ========================//

            case 'products':
                if (isset($_POST["keyword"]) && $_POST["keyword"] != "") {
                    $kyw = $_POST["keyword"];
                } else {
                    $kyw = "";
                }
                if (isset($_GET["id"]) && $_GET["id"] > 0) {
                    $id = $_GET["id"];
                } else {
                    $id = 0;
                }
                $dssp = loadall_products($kyw, $id); // Gọi hàm với từ khóa tìm kiếm
                $tendm = load_ten_dm($id);
                include "view/products.php";  // Hiển thị kết quả tìm kiếm
                break;

        case 'productsct':
            if (isset($_GET["id"]) && $_GET["id"] > 0) {
                $id = $_GET["id"];
                $onesp = loadone_products($id);
                extract($onesp);
            } else {
                include "view/main.php";
            }
            include "view/productsct.php";
            break;



        case 'gioithieu':
            include "view/gioithieu.php";
            break;
        case 'lienhe':
            include "view/lienhe.php";
            break;
        case 'sanpham':
            include "view/sanpham.php";
            break;


        case 'addtocart':
            if (isset($_POST['addtocart']) && ($_POST['addtocart'])) {
                // $id = isset($_GET['id']) ? $_GET['id'] : null;
                $id = $_POST['id'];
                // $product_name = isset($_POST['product_name']) ? $_POST['product_name'] : null;
                $product_name = $_POST['product_name'];
                $image = $_POST['image'];
                $price = $_POST['price'];

                $soluong = 1;
                $fg = 0;
                $i = 0;
                foreach ($_SESSION['mycart'] as $item) {
                    // debug($item);
                    if ($item[1] == $product_name) {
                        $slnew = $soluong + $item[4];
                        $_SESSION['mycart'][$i][4] = $slnew;
                        $_SESSION['mycart'][$i][7] = $_SESSION['mycart'][$i][4] * $_SESSION['mycart'][$i][3];
                        $fg = 1;
                        break;
                    }
                    $i++;
                }
                $spadd = [$id, $product_name, $image, $price, $soluong];
                array_push($_SESSION['mycart'], $spadd);
            }
            include "view/viewcart.php";
            break;
        case 'delcart':
            if (isset($_GET['idcart'])) {
                $idcart = $_GET['idcart'];
                unset($_SESSION['mycart'][$idcart]);
                $_SESSION['mycart'] = array_values($_SESSION['mycart']); // Sắp xếp lại chỉ số
            } else {
                $_SESSION['mycart'] = [];
            }
            header('Location: index.php?act=viewcart');
            break;

        case 'viewcart':
            include 'view/viewcart.php';
            break;
        case 'bill':
            include "view/bill.php";
            break;

        case 'billcomfirm';
            if (isset($_POST['dongydathang']) && ($_POST['dongydathang'])) {
                $user_id = $_SESSION['id'];
                $username = $_POST['username'];
                $email = $_POST['email'];
                $diachi = $_POST['diachi'];
                $dienthoai = $_POST['dienthoai'];
                $pttt = $_POST['pttt'];
                $tongdonhang = tongdonhang();
                $idorders = insert_orders($user_id, $username, $email, $dienthoai, $pttt, $tongdonhang, $diachi);

                if ($idorders) {
                    if (isset($_SESSION['mycart']) && count($_SESSION['mycart']) > 0) {
                        foreach ($_SESSION['mycart'] as $cart) {
                            $product_id = $cart[0];
                            $quantity = $cart[4];
                            $unit_price = $cart[3];
                            $tongsanpham = tongsanpham();
                            // Gọi hàm để thêm sản phẩm vào bảng orders_item
                            insert_order_item($idorders, $product_id, $quantity, $unit_price, $tongsanpham);
                        }
                    }
                    unset($_SESSION['mycart']);
                }
            } else {
                echo "lỗi khi khởi tạo đơn hàng";
            }

            include 'view/billcomfirm.php';
            break;
            //and
        case 'mybill':
            myOrders();
            break;



            // Start Login
        case 'go-login':
            loginUser();
            break;


        case 'go-register':
            registerUser();
            break;

        case 'go-succsess':
            succsessUser();
            break;

        case 'show-client':
            show_Client();
            break;

        case 'update-client':
            update_Client();
            break;


        case 'go-logout':
            session_unset();
            header("Location: ?act=go-login");
            break;

            // End Login
        default:
            include "view/home.php";
            break;
    }
} else {
    include "view/home.php";
}
include "view/footer.php";
