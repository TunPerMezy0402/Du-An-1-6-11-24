<?php

class ProductController
{
    public $product;
    public $category;

    public function __construct()
    {
        $this->product = new Products();
        $this->category = new Categorys();
    }

    public function list()
    {
        $data = $this->product->getAllProduct();

        require_once "./views/Admin/Products/listProduct.php";
    }

    public function show()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $datap = $this->product->getOneProduct($id);
            if (empty($datap)) {
                header('Location: ?act=list-product');
            }
        } else {
            header('Location: ?act=list-Products');
        }
        require_once "./views/Admin/Products/showProduct.php";
    }
    
    public function add()
    {
        $cate = $this->category->getAllCattegory();
        if (isset($_POST['btnSendPro'])) {
            $error = [];

            $category_id = $_POST['category_id'];

            $product_name = $_POST['product_name'];
            if ($product_name == "") {
                $error['product_name'] = "Bạn chưa nhập tên của sản phẩm!";
            }

            $description = $_POST['description'];
            if ($description == "") {
                $error['description'] = "Bạn chưa nhập chi tiết của sản phẩm!";
            }

            $file = $_FILES['image'];

            $price = $_POST['price'];
            if ($price == "") {
                $error['price'] = "Bạn chưa nhập Giá của sản phẩm!";
            }

            $brand = $_POST['brand'];
            if ($brand == "") {
                $error['brand'] = "Bạn chưa nhập thương hiệu của sản phẩm!";
            }

            $model = $_POST['model'];
            if ($model == "") {
                $error['model'] = "Bạn chưa nhập mẫu của sản phẩm!";
            }

            $color = $_POST['color'];
            if ($color == "") {
                $error['color'] = "Bạn chưa nhập màu của sản phẩm!";
            }

            $material = $_POST['material'];
            if ($material == "") {
                $error['material'] = "Bạn chưa nhập chất liệu dây đeo của sản phẩm!";
            }

            $water_resistant = $_POST['water_resistant'];
            if ($water_resistant == "") {
                $error['water_resistant'] = "Bạn chưa nhập độ chống nước của sản phẩm!";
            }

            $stock_quantity = $_POST['stock_quantity'];
            if ($stock_quantity == "") {
                $error['stock_quantity'] = "Bạn chưa nhập số lượng của sản phẩm!";
            }

            if (empty($error)) {
                $this->product->addProduct($category_id, $product_name, $description, $file['name'], $price, $brand, $model, $color, $material, $water_resistant, $stock_quantity);
                $img_path = "uploads/" . $file['name'];
                if ($file['error'] == 0) {
                    move_uploaded_file($file['tmp_name'], $img_path);
                }
                $error['success'] = 'Thêm mới thành công!';
            }

        }
        require_once "./views/Admin/Products/addProduct.php";
    }
    public function update()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $data = $this->product->getOneProduct($id);
            $cate = $this->category->getAllCattegory();
            if (empty($data)) {
                header('Location: ?act=list-product');
            }
        } else {
            header('Location: ?act=list-product');
        }

        if (isset($_POST['btnSendPros'])) {
            $error = [];

            $category_id = $_POST['category_id'];

            $product_name = $_POST['product_name'];
            if ($product_name == "") {
                $error['product_name'] = "Bạn chưa nhập tên của sản phẩm!";
            }

            $description = $_POST['description'];
            if ($description == "") {
                $error['description'] = "Bạn chưa nhập chi tiết của sản phẩm!";
            }

            $file = $_FILES['image'];

            $price = $_POST['price'];
            if ($price == "") {
                $error['price'] = "Bạn chưa nhập Giá của sản phẩm!";
            }

            $brand = $_POST['brand'];
            if ($brand == "") {
                $error['brand'] = "Bạn chưa nhập thương hiệu của sản phẩm!";
            }

            $model = $_POST['model'];
            if ($model == "") {
                $error['model'] = "Bạn chưa nhập mẫu của sản phẩm!";
            }

            $color = $_POST['color'];
            if ($color == "") {
                $error['color'] = "Bạn chưa nhập màu của sản phẩm!";
            }

            $material = $_POST['material'];
            if ($material == "") {
                $error['material'] = "Bạn chưa nhập chất liệu dây đeo của sản phẩm!";
            }

            $water_resistant = $_POST['water_resistant'];
            if ($water_resistant == "") {
                $error['water_resistant'] = "Bạn chưa nhập độ chống nước của sản phẩm!";
            }

            $stock_quantity = $_POST['stock_quantity'];
            if ($stock_quantity == "") {
                $error['stock_quantity'] = "Bạn chưa nhập số lượng của sản phẩm!";
            }

            if (empty($error)) {
                $this->product->updateProduct($id, $category_id, $product_name, $description, $file['name'], $price, $brand, $model, $color, $material, $water_resistant, $stock_quantity);
                $img_path = "uploads/" . $file['name'];
                if ($file['error'] == 0) {
                    move_uploaded_file($file['tmp_name'], $img_path);
                }
                $_SESSION['success'] = 'Update thành công!';
                header('Location: ?act=update-product&id=' . $id);
                exit();
            }

        }
        require_once "./views/Admin/Products/updateProduct.php";
    }

    public function delete()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $this->product->delete($id);
            header('Location: ?act=list-product');
        } else {
            header('Location: ?act=list-product');
        }
    }

    public function showProductChart()
{
    $data = $this->product->getProductStatistics(); // Lấy dữ liệu từ DB
    $categories = $this->category->getAllCattegory(); // Lấy danh mục sản phẩm

    // Map category_id thành tên danh mục
    $chartData = [];
    foreach ($data as $item) {
        $categoryName = array_column($categories, 'category_name', 'id')[$item['category_id']] ?? 'Unknown';
        $chartData[] = [
            'category' => $categoryName,
            'count' => $item['product_count']
        ];
    }

    // Truyền dữ liệu cho view
    require_once './views/Admin/Products/productChart.php';
}
}