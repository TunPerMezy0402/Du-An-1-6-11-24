<?php

class VariantController
{
    public $variant;

    public function __construct()
    {
        $this->variant = new Variant();
    }

    public function list()
    {
        $data = $this->variant->getAllVariant();

        require_once "./views/Admin/Variants/listVariant.php";
    }
    public function add()
    {
        if (isset($_POST['btnSendVari'])) {
            $error = [];

            $option_name = $_POST['option_name'];
            if ($option_name == "") {
                $error['option_name'] = "Bạn chưa nhập tên thuộc tính";
            }
            $option_value = $_POST['option_value'];
            if ($option_value == "") {
                $error['option_value'] = "Bạn chưa nhập chi tiết thuộc tính";
            }
            $this->variant->addVariant($option_name, $option_value);
            if (empty($error)) {
                $error['success'] = 'Thêm mới thành công.';
            }
            
        }
        require_once "./views/Admin/Variants/addVariant.php";
    }

    public function update()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $data = $this->variant->getOne($id);
            if (empty($data)) {
                header('Location: ?act=list-variant');
            }
        } else {
            header('Location: ?act=list-variant');
        }
        if (isset($_POST['btnSendVaris'])) {
            $error = [];

            $option_name = $_POST['option_name'];
            if ($option_name == "") {
                $error['option_name'] = "Bạn chưa nhập tên thuộc tính";
            }

            $option_value = $_POST['option_value'];
            if ($option_value == "") {
                $error['option_value'] = "Bạn chưa nhập chi tiết thuộc tính";
            }

            $this->variant->updateVariant($id, $option_name, $option_value);
            $_SESSION['success'] = 'Update thành công.';
            header('Location: ?act=update-variant&id=' . $id);
            exit();
        }

        require_once "./views/Admin/Variants/updateVariant.php";
    }

    public function delete()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $this->variant->delete($id);
            header('Location: ?act=list-variant');
        } else {
            header('Location: ?act=list-variant');
        }
    }

}