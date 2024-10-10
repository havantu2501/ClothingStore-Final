<?php


class AdminUserController
{
    public $modelUser;
    public function __construct()
    {
        $this->modelUser = new AdminUser();
    }

    public function user()
    {
        $listUser = $this->modelUser->getAllUser(1);
        require_once './views/danhmuc/User.php';
    }

    //Show
    public function ShowUser()
    {
        $id = $_GET['id_user'];
        $user = $this->modelUser->getUser($id);
        if ($user) {
            require_once './views/danhmuc/showUser.php';
        } else {
            header("Location: " . BASE_URL_ADMIN . '?act=user');
            exit();
        }
    }

    // ADD
    public function formAddUser()
    {
        require_once './views/danhmuc/addUser.php';
    }
    public function postAddUser()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $fullname = $_POST['fullname'];
            $email = $_POST['email'];
            // $password = $_POST['password'];
            $address = $_POST['address'];
            $phone_number = $_POST['phone_number'];
            $role_id = $_POST['role_id'];

            $errors = [];
            if (empty($fullname)) {
                $errors['fullname'] = 'Ko để trống';
            }

            if (empty($errors)) {
                // passwprd mặc định
                $password = password_hash('123123abc', PASSWORD_BCRYPT);
                // var_dump($password);
                // die();
                // khai báo role
                $role_id = 1;
                $this->modelUser->insertUser($fullname, $email, $password, $address, $phone_number, $role_id);
                header("Location: " . BASE_URL_ADMIN . '?act=user');
                exit();
            } else {
                require_once './views/danhmuc/addUser.php';
            }
        }
    }

    // EDIT
    public function formEditUser()
    {
        $id = $_GET['id_user'];
        $user = $this->modelUser->getDetailUser($id);
        if ($user) {
            require_once './views/danhmuc/editUser.php';
        } else {
            header("Location: " . BASE_URL_ADMIN . '?act=user');
            exit();
        }
    }
    public function postEditUser()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $fullname = $_POST['fullname'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $address = $_POST['address'];
            $phone_number = $_POST['phone_number'];
            $role_id = $_POST['role_id'];


            $errors = [];
            if (empty($fullname)) {
                $errors['fullname'] = 'Ko để trống';
            }

            if (empty($errors)) {
                $this->modelUser->updateUser($id, $fullname, $email, $password, $address, $phone_number, $role_id);
                header("Location: " . BASE_URL_ADMIN . '?act=user');
                exit();
            } else {
                $user = ['id' => $id, 'fullname' => $fullname, 'email' => $email, 'password' => $password, 'address' => $address, 'phone_number' => $phone_number, 'role_id' => $role_id];
                require_once './views/danhmuc/editUser.php';
            }
        }
    }

    //DELETE

    public function deleteUser()
    {
        $id = $_GET['id_user'];
        $user = $this->modelUser->getDetailUser($id);

        if ($user) {
            $this->modelUser->destroyUser($id);
        }
        header("Location: " . BASE_URL_ADMIN . '?act=user');
        exit();
    }

    //Auth
    public function formLogin()
    {
        require_once './views/auth/formLogin.php';
        deleteSessionError();
    }
    public function Login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = $this->modelUser->checkLogin($password, $email);
            // var_dump($user);
            // die;

            if ($user == $email) {
                $_SESSION['user_admin'] = $user;
                header("Location: " . BASE_URL_ADMIN . '?act=user');
                exit();
            } else {
                $_SESSION['error'] = $user;
                $_SESSION['flash'] = true;
                header("Location: " . BASE_URL_ADMIN . '?act=login-admin');
                exit();
            }
        }
    }
    public function Logout()
    {
        session_start(); // Bắt đầu phiên (nếu chưa khởi tạo)

        if (isset($_SESSION['user_admin'])) {
            unset($_SESSION['user_admin']); // Hủy biến session user_admin
            header("Location: " . BASE_URL_ADMIN . '?act=login-admin'); // Chuyển hướng
            exit(); // Dừng mã
        }
    }

    // CLIENT

    public function client()
    {
        $listClient = $this->modelUser->getAllUser(2);
        require_once './views/manager/client/client.php';
    }
    public function formEditClient()
    {
        $id = $_GET['id_client'];
        $client = $this->modelUser->getDetailUser($id);
        if ($client) {
            require_once './views/manager/client/editClient.php';
        } else {
            header("Location: " . BASE_URL_ADMIN . '?act=client');
            exit();
        }
    }
    public function postEditClient()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $fullname = $_POST['fullname'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $phone_number = $_POST['phone_number'];



            $errors = [];
            if (empty($fullname)) {
                $errors['fullname'] = 'Ko để trống';
            }

            if (empty($errors)) {
                $this->modelUser->updateClient($id, $fullname, $email,  $address, $phone_number);
                header("Location: " . BASE_URL_ADMIN . '?act=client');
                exit();
            } else {
                $client = ['id' => $id, 'fullname' => $fullname, 'email' => $email, 'address' => $address, 'phone_number' => $phone_number];
                require_once './views/manager/client/editClient.php';
            }
        }
    }
    public function ShowClient()
    {
        $id = $_GET['id_client'];
        $client = $this->modelUser->getClient($id);
        if ($client) {
            require_once './views/manager/client/showClient.php';
        } else {
            header("Location: " . BASE_URL_ADMIN . '?act=client');
            exit();
        }
    }
    // resser Pass
    public function resetPassword()
    {
        $user_id = $_GET['id_user'];
        $user = $this->modelUser->getDetailUser($user_id);
        // pass mặc định
        $password = password_hash('123123abc', PASSWORD_BCRYPT);
        $status = $this->modelUser->resetPassword($user_id, $password);
        if ($status && $user['role_id'] == 1) {
            header("Location: " . BASE_URL_ADMIN . '?act=user');
            exit();
        } elseif ($status && $user['role_id'] == 2) {
            header("Location: " . BASE_URL_ADMIN . '?act=client');
            exit();
        } else {
            var_dump('Lỗi');
            die;
        }
    }
}
