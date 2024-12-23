<?php

class HomeController
{
    public $product;

    public function __construct()
    {
        $this->product = new Products();
    }
    // public function home()
    // {
    //     if (isset($_POST["logoutsss"])) {

    //         unset($_SESSION["user"]);
    //         header("Refresh:0");
    //     }

    //     $data = $this->product->getAllProduct();

    //     require_once './views/TrangChu/Home.php';
    // }

    public function homeAdmin()
    {
        require_once './views/Admin/HomeAdmin.php';
    }
}