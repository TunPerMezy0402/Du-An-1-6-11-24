<?php
ob_start();

function ValidateUserRegister($data)
{
    $errors = [];

    $isUniqueUser = checkUniqueName('users', $data['username']);

    if (!$isUniqueUser) {
        $errors[] = 'Username đã tồn tại vui lòng nhập user khác';
    }
    
    $isUniqueEmail = checkUniqueEmail('users', $data['email']);

    if (!$isUniqueEmail) {
        $errors[] = 'Email đã tồn tại vui lòng nhập Email khác';
    }   


    // Trường Name
    if (empty($data['username'])) {
        $errors[] = 'Nickname bạn đang để trống';
    } else if (strlen($data['username']) > 15) {
        $errors[] = 'Nickname dài tối đa 15 ký tự';
    }

    // Trường Email
    if (empty($data['email'])) {
        $errors[] = 'Email bạn đang để trống';
    } else if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Email chưa đúng định dạng';
    }

    // Trường Password
    if (empty($data['password'])) {
        $errors[] = 'Password bạn đang để trống';
    } else if (strlen($data['password']) < 8 || strlen($data['password']) > 20) {
        $errors[] = 'Password lớn hơn 8 và nhỏ hơn 20 ký tự';
    }

    return $errors;
}
function ValidateUserUpdate($id,$data) {

    $error = [];

        $username = $data['username'];
        $id = $_SESSION['id'];

        $isUniqueUser2 = checkUniqueNameForUpdate('users', $id, $username);
        if (!$isUniqueUser2) {
            $error['username'] = 'Username đã tồn tại vui lòng nhập username khác';
        }

        if ($username == "") {
            $error['username'] = "Bạn chưa nhập username!";
        }

        $email = $data['email'];
        $isUniqueEmail2 = checkUniqueEmailForUpdate('users', $id, $email);
        if (!$isUniqueEmail2) {
            $error['email'] = 'Email đã tồn tại vui lòng nhập Email khác';
        }

        if ($email == "") {
            $error['email'] = "Bạn chưa nhập email !";
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error['email'] = "Email chưa đúng định dạng !";
        }

        $password = $data['password'];
        if ($password == "") {
            $error['password'] = "Bạn chưa nhập password!";
        }

    return $error;

}


function LoginUser()
{
    require_once "view/accsess/login.php";
    if (!empty($_POST['btn_login']) && $_POST['btn_login']) {
        $user_name = isset($_POST['login_email']) ? $_POST['login_email'] : null;
        $user_pass = isset($_POST['login_pass']) ? $_POST['login_pass'] : null;

        $data = [
            'name' => $_POST['login_email'] ?? null,
            'pass' => $_POST['login_pass'] ?? null
        ];

        if ($user_name && $user_pass) {
            $taikhoan = check_AccountUser($user_name, $user_pass);

            if ($taikhoan == null) {
                $_SESSION['errors'] = "Tài Khoản Hoặc Mật Khẩu Không Chính Xác";
                header("Location:" . BASE_URL . '?act=go-login');

                exit();
            }

            if (is_array($taikhoan)) {
                $role = $taikhoan['role'];

                if ($role == 'user') {
                    $_SESSION['id'] = $taikhoan['id'];
                    $_SESSION['username'] = $taikhoan['username'];
                    if(!empty($taikhoan['avatar'])) {
                        $_SESSION['avatar'] = $taikhoan['avatar'];
                    }
                    $_SESSION['email'] = $taikhoan['email'];
                    $_SESSION['pass'] = $taikhoan['password'];
                    /* $_SESSION['created_at'] = date("d-m-Y", strtotime($taikhoan['created_at'])); */
                    $_SESSION['role'] = $role;
                    header("Location:" . BASE_URL);
                    exit();
                } elseif ($role == 'admin') {
                    $_SESSION['id'] = $taikhoan['id'];
                    $_SESSION['name_admin'] = $taikhoan['username'];
                    $_SESSION['username'] = $_SESSION['name_admin'];
                    if(!empty($taikhoan['avatar'])) {
                        $_SESSION['avatar'] = $taikhoan['avatar'];
                    }
                    $_SESSION['email'] = $taikhoan['email'];
                    $_SESSION['pass'] = $taikhoan['password'];
                    /* $_SESSION['created_at'] = date("d-m-Y", strtotime($taikhoan['created_at'])); */
                    $_SESSION['role'] = $role;
                    header("Location:" . BASE_URL_ADMIN); /* ********************************************************** */
                    exit();
                } else {
                    $_SESSION['errors'] = "Lỗi Định Danh Tài Khoản";
                    header("Location:" . BASE_URL . '?act=go-login');

                    exit();
                }
            }
        } else {
            $_SESSION['errors'] = "Vui lòng nhập tài khoản và mật khẩu";
            header("Location:" . BASE_URL . '?act=go-login');

            exit();
        }
    }
}

function RegisterUser()
{

    require_once "view/accsess/register.php";

    if (!empty($_POST['btn_register']) && $_POST['btn_register']) {
        /* $date = (new DateTime())->format('Y-m-d H:i:s'); */
        $data = [
            'username' => $_POST['register_name'] ?? null,
            'email' => $_POST['register_email'] ?? null,
            'password' => $_POST['register_pass'] ?? null,
            'role' => 'user',
            /* 'created_at' => $date,
            'updated_at' => $date, */
        ];

        $errors = validateUserRegister($data);
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            $_SESSION['data'] = $data;
            header("Location:" . BASE_URL . '?act=go-register');
            exit();
        }

        insert('users', $data);
        header('Location: '. BASE_URL. '?act=go-succsess');
        exit;
    }
}

function succsessUser()
{
    require_once "view/accsess/succsess.php";
}

function show_Client()
{
    require_once "view/accsess/showclient.php";
}


function update_Client()
{   
    
    if (!empty($_POST['update-btn-client']) && $_POST['update-btn-client']) {
        $id = $_SESSION['id'];
        $file = $_FILES['avatar'];
        $date = (new DateTime())->format('Y-m-d H:i:s');
        $data = [
            'username' => $_POST['username'] ?? null,
            'email' => $_POST['email'] ?? null,
            'avatar' => $file['name'] ?? null,
            'password' => $_POST['password'] ?? null,
            'role' => 'user',
            'updated_at' => $date,
            
        ];
        $error = ValidateUserUpdate($_SESSION['id'],$data);

        if (empty($error)) {
            update('users',$id,$data);
            $img_path = $_SERVER['DOCUMENT_ROOT'] . "/duanghep/admin/uploads/" . $file['name'];
            if ($file['error'] == 0) {
                move_uploaded_file($file['tmp_name'], $img_path);
            }
            
            
            
            
            $_SESSION['username'] = $data['username'];
            if (!empty($file['name'])) {
                $_SESSION['avatar'] = $file['name'];
            } else {
                $_SESSION['avatar'] = 'user.gif';
            }
            $_SESSION['email'] = $data['email'];
            $_SESSION['pass'] = $data['password'];
            $_SESSION['success'] = 'Cập Nhật thành công!';
        }
        
        
    }
    require_once "view/accsess/updateclient.php";
}

//Toàn thêm
function LogoutUser()
{
    session_unset();
    header("Location:" . BASE_URL . "?act=go-login");
}
function myOrders() {
    if (!isset($_SESSION['id'])) {
        header("Location: ?act=go-login");
        exit();
    }

    $userId = $_SESSION['id'];
    $orders = getOrdersByUser($userId);
    require_once "view/mybill.php";
}
//and
?>