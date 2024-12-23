<?php

class ProductVariantController
{
    public $productVariant;
    public $product;
    public $variant;

    public function __construct()
    {
        $this->product = new Products();
        $this->productVariant = new ProductVariant();
        $this->variant = new Variant();
    }

    public function list()
    {
        $datav = $this->productVariant->getAllProductVariant();

        require_once "./views/Admin/ProductVariants/listProductVariant.php";
    }

    public function show()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $datapv = $this->productVariant->getOne($id);
            if (empty($datapv)) {
                header('Location: ?act=list-productVariant');
            }
        } else {
            header('Location: ?act=list-productVariant');
        }
        require_once "./views/Admin/ProductVariants/showProductVariant.php";
    }

    public function add()
    {
        $product = $this->product->getAllProduct();
        $vari = $this->variant->getAllVariant();
        if (isset($_POST['btnSendProv'])) {
            $error = [];

            $product_id = $_POST['product_id'];

            $variant_id = $_POST['variant_id'];

            $sku = $_POST['sku'];
            if ($sku == "") {
                $error['sku'] = "Bạn chưa nhập mã sku!";
            }

            $file = $_FILES['image'];

            $price = $_POST['price'];
            if ($price == "") {
                $error['price'] = "Bạn chưa nhập Giá của sản phẩm biến thể!";
            }

            $stock_quantity = $_POST['stock_quantity'];
            if ($stock_quantity == "") {
                $error['stock_quantity'] = "Bạn chưa nhập số lượng của sản phẩm biến thể!";
            }



            if (empty($error)) {
                $this->productVariant->addProductVariant($product_id, $variant_id, $sku, $file['name'], $price, $stock_quantity);
                $img_path = "uploads/" . $file['name'];
                if ($file['error'] == 0) {
                    move_uploaded_file($file['tmp_name'], $img_path);
                }
                $error['success'] = 'Thêm mới thành công!';
            }

        }
        require_once "./views/Admin/ProductVariants/addProductVariant.php";
    }

    public function update()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $data = $this->productVariant->getOne($id);
            $product = $this->product->getAllProduct();
            $vari = $this->variant->getAllVariant();
            if (empty($data)) {
                header('Location: ?act=list-productVariant');
            }
        } else {
            header('Location: ?act=list-productVariant');
        }

        if (isset($_POST['btnSendProVs'])) {
            $error = [];

            $product_id = $_POST['product_id'];

            $variant_id = $_POST['variant_id'];

            $sku = $_POST['sku'];
            if ($sku == "") {
                $error['sku'] = "Bạn chưa nhập mã sku!";
            }

            $file = $_FILES['image'];

            $price = $_POST['price'];
            if ($price == "") {
                $error['price'] = "Bạn chưa nhập Giá của sản phẩm biến thể!";
            }

            $stock_quantity = $_POST['stock_quantity'];
            if ($stock_quantity == "") {
                $error['stock_quantity'] = "Bạn chưa nhập số lượng của sản phẩm biến thể!";
            }

            if (empty($error)) {
                $this->productVariant->update($id, $product_id, $variant_id, $sku, $price,$file['name'],  $stock_quantity);
                $img_path = "uploads/" . $file['name'];
                if ($file['error'] == 0) {
                    move_uploaded_file($file['tmp_name'], $img_path);
                }
                $_SESSION['success'] = 'Update thành công!';
                header('Location: ?act=update-productVariant&id=' . $id);
                exit();
            }

        }
        require_once "./views/Admin/ProductVariants/updateProductVariant.php";
    }

    public function delete()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $this->productVariant->delete($id);
            header('Location: ?act=list-productVariant');
        } else {
            header('Location: ?act=list-productVariant');
        }
    }
}

?>