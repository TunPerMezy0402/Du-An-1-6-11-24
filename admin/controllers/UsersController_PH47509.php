<?php

class UserController
{
    public $users;

    public function __construct()
    {
        $this->users = new Users();
    }

    public function listUsers()
    {
        $datav = $this->users->getAllUser();
        require_once "./views/Admin/Users/listUser.php";
    }

    public function showUser()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $dataz = $this->users->getOne($id);
            if (empty($dataz)) {
                header('Location: ?act=list-user');
            }
        } else {
            header('Location: ?act=list-user');
        }
        require_once "./views/Admin/Users/showUser.php";
    }


    public function addUser()
    {
        if (isset($_POST['btnAddUser'])) {
            $error = [];

            $username = $_POST['username'];
            $isUniqueUser = $this->users->checkUniqueName2('users', $username);
            if (!$isUniqueUser) {
                $error['username'] = 'Username đã tồn tại vui lòng nhập username khác';
            }

            if ($username == "") {
                $error['username'] = "Bạn chưa nhập username!";
            }



            $email = $_POST['email'];
            $isUniqueEmail = $this->users->checkUniqueEmail2('users', $email);
            if (!$isUniqueEmail) {
                $error['email'] = 'Email đã tồn tại vui lòng nhập Email khác';
            }

            if ($email == "") {
                $error['email'] = "Bạn chưa nhập email !";
            } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error['email'] = "Email chưa đúng định dạng !";
            }

            $password = $_POST['password'];
            if ($password == "") {
                $error['password'] = "Bạn chưa nhập password!";
            }

            $file = $_FILES['avatar'];

            $role = $_POST['navuser'];


            if (empty($error)) {
                $this->users->addUser($username, $email, $password, $file['name'], $role);
                $img_path = "uploads/" . $file['name'];
                if ($file['error'] == 0) {
                    move_uploaded_file($file['tmp_name'], $img_path);
                }
                $_SESSION['success'] = 'Thêm mới thành công!';
                header('Location: ?act=list-user');
            }
            
        }
        require_once "./views/Admin/Users/addUser.php";
    }

    public function updateUser()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $datao = $this->users->getOne($id);
            if (empty($datao)) {
                header('Location: ?act=list-user');
            }
        } else {
            header('Location: ?act=list-user');
        }

        if (isset($_POST['btnUpdateUser'])) {
            $error = [];

            $username = $_POST['username'];

            $isUniqueUser2 = $this->users->checkUniqueNameForUpdate2('users', $id, $username);
            if (!$isUniqueUser2) {
                $error['username'] = 'Username đã tồn tại vui lòng nhập username khác';
            }

            if ($username == "") {
                $error['username'] = "Bạn chưa nhập username!";
            }

            $email = $_POST['email'];
            $isUniqueEmail2 = $this->users->checkUniqueEmailForUpdate2('users', $id, $email);
            if (!$isUniqueEmail2) {
                $error['email'] = 'Email đã tồn tại vui lòng nhập Email khác';
            }

            if ($email == "") {
                $error['email'] = "Bạn chưa nhập email !";
            } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error['email'] = "Email chưa đúng định dạng !";
            }

            $password = $_POST['password'];
            if ($password == "") {
                $error['password'] = "Bạn chưa nhập password!";
            }

            $file = $_FILES['avatar'];

            $role = $_POST['navuser'];

            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $updated_at = date('Y-m-d H:i:s');


            if (empty($error)) {
                $this->users->updateUser($id, $username, $email, $password, $file['name'], $role, $updated_at);
                $img_path = "uploads/" . $file['name'];
                if ($file['error'] == 0) {
                    move_uploaded_file($file['tmp_name'], $img_path);
                }
                $_SESSION['success'] = 'Cập Nhật thành công!';
                header('Location: ?act=update-user&id=' . $id);
                exit;
            }
        }
        require_once "./views/Admin/Users/updateUser.php";
    }

    public function delete()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $this->users->delete($id);
            header('Location: ?act=list-user');
        } else {
            header('Location: ?act=list-user');
        }
    }
}
