<?php
session_start();
require_once './helpers/env.php';
require_once '../common/env2.php';


require_once './controllers/ProductController.php';
require_once './controllers/HomeController.php';
require_once './controllers/CategoryController.php';
require_once './controllers/ProductVariantController.php';
require_once './controllers/VariantController.php';
require_once './controllers/UsersController_PH47509.php';
require_once './controllers/OrderController.php';


require_once './models/Database.php';
require_once './models/Products.php';
require_once './models/Categorys.php';
require_once './models/ProductVariant.php';
require_once './models/Variant.php';
require_once './models/Users_PH47509.php';
require_once './models/Orders.php';



$home = new HomeController();
$users = new UserController();
$products = new productController();
$categorys = new CategoryController();
$productVariants = new ProductVariantController();
$variants = new VariantController();
$order = new OrderController();


$act = $_GET['act'] ?? '/';
match ($act) {
    '/' => $home->homeAdmin(),

    'list-user' => $users->listUsers(),
    'show-user' => $users->showUser(),
    'add-user' => $users->addUser(),
    'update-user' => $users->updateUser(),
    'delete-user' => $users->delete(),


    //danh mục
    'list-category' => $categorys->listCate(),
    'show-category' => $categorys->showCate(),
    'add-category' => $categorys->addCate(),
    'update-category' => $categorys->updateCate(),
    'delete-category' => $categorys->delete(),

    //sản phẩm
    'list-product' => $products->list(),
    'show-product' => $products->show(),
    'add-product' => $products->add(),
    'update-product' => $products->update(),
    'delete-product' => $products->delete(),

    //thống kê
    'product-chart' => $products->showProductChart(),

    // sản phẩm biến thể

    'list-productVariant' => $productVariants->list(),
    'show-productVariant' => $productVariants->show(),
    'add-productVariant' => $productVariants->add(),
    'update-productVariant' => $productVariants->update(),
    'delete-productVariant' => $productVariants->delete(),

    // thuộc tính biến thể
    'list-variant' => $variants->list(),
    'add-variant' => $variants->add(),
    'update-variant' => $variants->update(),
    'delete-variant' => $variants->delete(),
    
    // đơn hàng
    'list-order' => $order->listOrder(),
    'show-order' => $order->showOrder(),
    'update-order' => $order->updateOrder(),
};