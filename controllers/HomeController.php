<?php

class HomeController
{
    public $modelProduct;
    public $modelUserClient;
    public $modelCart;
    public function __construct()
    {
        $this->modelProduct = new Product();
        $this->modelUserClient = new UserClient();
        $this->modelCart = new Cart();
    }
    public function home()
    {
        $listProduct = $this->modelProduct->getAllProduct();
        require_once 'views/LayoutClient/home.php';
    }
    public function homepage()
    {
        $listProduct = $this->modelProduct->getAllProduct();
        require_once 'views/LayoutClient/home.php';
    }
    public function productpage()
    {
        require_once 'views/LayoutClient/listProduct.php';
    }

    public function myAccount()
    {
        require_once 'views/LayoutClient/myAcount.php';
    }


    //
    public function detailProduct()
    {
        $id = $_GET['id_product'];
        $product = $this->modelProduct->getDetailProduct($id);
        if ($product) {
            require_once './views/LayoutClient/singleProduct.php';
        } else {
            header("Location: " . BASE_URL);
            exit();
        }
    }
    // Auth
    public function login()
    {
        require_once 'views/Auth/Login.php';
    }

    public function postlogin()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = $this->modelUserClient->checkLogin($password, $email);
            // var_dump($user);
            // die;

            if ($user == $email) {
                $_SESSION['user_client'] = $user;
                header("Location: " . BASE_URL);
                exit();
            } else {
                $_SESSION['error'] = $user;
                $_SESSION['flash'] = true;
                header("Location: " . BASE_URL . '?act=login');
                exit();
            }
        }
    }
    public function Logout()
    {
        session_start(); // Bắt đầu phiên (nếu chưa khởi tạo)

        if (isset($_SESSION['user_client'])) {
            unset($_SESSION['user_client']); // Hủy biến session user_admin
            header("Location: " . BASE_URL . '?act=login'); // Chuyển hướng
            exit(); // Dừng mã
        }
    }
    //
    public function addCart()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_SESSION['user_client'])) {
                $mail = $this->modelUserClient->getUserFromEmail($_SESSION['user_client']);

                // Lấy giỏ hàng từ người dùng
                $cart = $this->modelCart->getCartFromUser($mail['id']);
                if (!$cart) {
                    $cartId = $this->modelCart->addCart($mail['id']);
                    $cart = ['id' => $cartId];
                    $detailCart = $this->modelCart->getDetailCart($cart['id']);
                } else {
                    $detailCart = $this->modelCart->getDetailCart($cart['id']);
                }
                // var_dump($_POST);die();

                // Lấy thông tin sản phẩm từ POST
                $product_id = $_POST['product_id'];
                $quantity = $_POST['quantity'];
                // var_dump($_POST);die();
                $checkProduct = false;
                $newQuantity = $quantity; // Khởi tạo biến với số lượng được gửi từ POST

                // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng chưa
                foreach ($detailCart as $detail) {
                    if ($detail['product_id'] == $product_id) {
                        $newQuantity = $detail['quantity'] + $quantity; // Cập nhật số lượng
                        $this->modelCart->updateQuantity($cart['id'], $product_id, $newQuantity);
                        $checkProduct = true; // Đánh dấu rằng sản phẩm đã tồn tại
                        break;
                    }
                }

                // Nếu sản phẩm không có trong giỏ hàng, thêm sản phẩm mới
                if (!$checkProduct) {
                    $this->modelCart->addDetailCart($cart['id'], $product_id, $newQuantity);
                }

                header("Location:" . BASE_URL . '?act=cart');
            } else {
                echo 'Chưa đăng nhập';
                die;
            }
        }
    }

    public function Cart()
    {
        if (isset($_SESSION['user_client'])) {

            $mail = $this->modelUserClient->getUserFromEmail($_SESSION['user_client']);

            // Lấy giỏ hàng từ người dùng
            $cart = $this->modelCart->getCartFromUser($mail['id']);
            $cartId = null;
            $totalMoney = 0;
            if (!$cart) {
                $cartId = $this->modelCart->addCart($mail['id']);
                $cart = ['id' => $cartId];
            }

            $detailCart = $this->modelCart->getDetailCart($cart['id']);
            // var_dump($cart);die();
            // echo "<pre>";
            // var_dump($detailCart);die();
            foreach ($detailCart as  $detalcart) {
                $totalMoney = $totalMoney + ($detalcart['discount'] * $detalcart['quantity']);
            }

            require_once './views/LayoutClient/cart.php';
        } else {
            echo 'Chưa đăng nhập';
            die;
        }
    }
}
