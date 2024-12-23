<?php

class CategoryController
{
    public $category;

    public function __construct()
    {
        $this->category = new Categorys();
    }

    public function listCate()
    {
        $data = $this->category->getAllCattegory();

        require_once "./views/Admin/Categorys/listCategory.php";
    }

    public function showCate()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $data = $this->category->getOne($id);
            if (empty($data)) {
                header('Location: ?act=list-category');
            }
        } else {
            header('Location: ?act=list-category');
        }
        require_once "./views/Admin/categorys/showCategory.php";
    }
    
    public function addCate()
    {
        if (isset($_POST['btnSendCate'])) {
            $error = [];

            $category_name = $_POST['category_name'];
            if ($category_name == "") {
                $error['category_name'] = "Bạn chưa nhập tên loại";
            }
            $description = $_POST['description'];
            if ($category_name == "") {
                $error['description'] = "Bạn chưa nhập chi tiết của loại";
            }
            $this->category->addCattegory($category_name, $description);
            if (empty($error)) {
                $error['success'] = 'Thêm mới thành công.';
            }

        }
        require_once "./views/Admin/Categorys/addCategory.php";
    }

    public function updateCate()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $data = $this->category->getOne($id);
            if (empty($data)) {
                header('Location: ?act=list-category');
            }
        } else {
            header('Location: ?act=list-category');
        }
        if (isset($_POST['btnSendCates'])) {
            $error = [];

            $category_name = $_POST['category_name'];
            if ($category_name == "") {
                $error['category_name'] = "Bạn chưa nhập tên loại";
            }
            $description = $_POST['description'];
            if ($category_name == "") {
                $error['description'] = "Bạn chưa nhập chi tiết của loại";
            }

            $this->category->updateCattegory($id, $category_name, $description);
            $_SESSION['success'] = 'Update thành công.';
            header('Location: ?act=update-category&id=' . $id);
            exit();
        }

        require_once "./views/Admin/Categorys/updateCategory.php";
    }

    public function delete()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $this->category->delete($id);
            header('Location: ?act=list-category');
        } else {
            header('Location: ?act=list-category');
        }
    }
}