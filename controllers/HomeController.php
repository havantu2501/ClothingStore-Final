<?php

class HomeController
{
    public $modelProduct;
    public $modelUserClient;
    public $modelCart;
    public $modelOrder;
    public function __construct()
    {
        $this->modelProduct = new Product();
        $this->modelUserClient = new UserClient();
        $this->modelCart = new Cart();
        $this->modelOrder = new Order();
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
        $listProduct = $this->modelProduct->getAllProduct();
        require_once 'views/LayoutClient/listProduct.php';
    }

    public function myAccount()
    {

        // Kiểm tra xem người dùng đã đăng nhập chưa
        if (!isset($_SESSION['user_client'])) {
            header('Location: login.php');
            exit;
        }

        // Lấy thông tin người dùng từ email đã lưu trong session
        $user = $this->modelUserClient->getUserFromEmail($_SESSION['user_client']);
        $email = $user['email']; // Giả sử bạn đã lấy email từ người dùng

        // Lấy chi tiết đơn hàng theo email
        $orders = $this->modelOrder->getOrderDetailByEmail($email);

        // // Kiểm tra xem có đơn hàng nào không
        // if (empty($orders)) {
        //     echo "Lỗi: Không tìm thấy đơn hàng cho email này.";
        //     return;
        // }

        // Lấy danh sách sản phẩm trong từng đơn hàng
        $productOrders = [];
        foreach ($orders as $order) {
            $productOrders[$order['id']] = $this->modelOrder->getListProductOrder($order['id']);
        }

        // Lấy tất cả trạng thái đơn hàng
        $listStatusOrders = [];
        foreach ($orders as $order) {
            $listStatusOrders[$order['id']] = $this->modelOrder->getAllStatusOder($order['id']);
        }

        if (isset($_POST['update_status'])) {
            $orderId = $_POST['order_id']; // ID đơn hàng từ form
            $newStatusId = $_POST['new_status_id']; // Trạng thái mới từ form

            $result = $this->modelOrder->updateOrderStatus($orderId, $newStatusId);

            if ($result) {

                $message = "update trạng thái ok!";
                echo "<script type='text/javascript'>alert('$message');</script>";
            } else {
                require_once 'views/LayoutClient/myAcount.php';
            }
        }


        // Tải view
        require_once 'views/LayoutClient/myAcount.php';
    }
    //



    // thanh toán
    public function checkout()
    {
        if (isset($_SESSION['user_client'])) {

            $user = $this->modelUserClient->getUserFromEmail($_SESSION['user_client']);

            // Lấy giỏ hàng từ người dùng
            $cart = $this->modelCart->getCartFromUser($user['id']);
            $totalMoney = 0;
            if (!$cart) {
                header("Location: " . BASE_URL);
                exit();
            }

            $detailCart = $this->modelCart->getDetailCart($cart['id']);
            // var_dump($cart);die();
            // echo "<pre>";
            // var_dump($detailCart);die();
            foreach ($detailCart as  $detalcart) {
                $totalMoney = $totalMoney + ($detalcart['discount'] * $detalcart['quantity']);
            }

            require_once 'views/LayoutClient/checkout.php';
        } else {
            echo 'Chưa đăng nhập';
            die;
        }
    }

    public function postCheckout()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Nhận thông tin từ form
            $fullname = $_POST['fullname'];
            $address = $_POST['address'];
            $phone_number = $_POST['phone_number'];
            $email = $_POST['email'];
            $notes = $_POST['notes'];
            $total_money = $_POST['total_money']; // Tổng tiền của đơn hàng

            $order_date = date('Y-m-d');
            $status_id = 1;

            // Lấy thông tin người dùng
            $user = $this->modelUserClient->getUserFromEmail($_SESSION['user_client']);


            if (!$user) {
                var_dump('Người dùng không tồn tại');
                die;
            }

            $user_id = $user['id'];
            // Tạo mã đơn hàng
            $order_code = 'DH-' . rand(1000, 9999);

            // Kiểm tra giỏ hàng
            $cart = $this->modelCart->getCartFromUser($user_id);
            // var_dump($cart);
            // die;
            if (!$cart) {
                var_dump('giỏ hàng trống');
                die;
            }

            // Thêm đơn hàng
            $order_id = $this->modelOrder->addOrder(
                $user_id,
                $fullname,
                $address,
                $phone_number,
                $email,
                $notes,
                $total_money,
                $order_date,
                $status_id,
                $order_code
            );

            // Nếu thêm đơn hàng thành công, thêm chi tiết đơn hàng

            $cartDeltails = $this->modelCart->getDetailCart($cart['id']);
            echo "<pre> ";
            var_dump($cartDeltails);

            // die;

            if ($order_id) {
                foreach ($cartDeltails as $item) {
                    $product_id = $item['product_id'];
                    $quantity = $item['quantity'];

                    // var_dump($product_id, $quantity);
                    // die;

                    // Lấy giá của sản phẩm
                    if (!empty($item['discount']) && $item['discount'] > 0) {
                        $price = $item['discount'];
                    } else {
                        $price = $item['price'];
                    }

                    // Tính tổng tiền cho sản phẩm
                    $item_total_money = $quantity * $price;

                    // Thêm chi tiết đơn hàng
                    $this->modelOrder->addOrder_details(
                        $order_id,
                        $product_id,
                        $price,
                        $quantity,
                        $item_total_money,
                        $cart['id']
                    );
                }

                // Xóa giỏ hàng sau khi đã tạo đơn hàng
                $this->modelCart->removeCart($cart['id'], $user_id);

                // Điều hướng hoặc thông báo thành công
                header('Location: ' . BASE_URL);
                exit();
            } else {
                var_dump('Thêm đơn hàng thất bại');
                die;
            }
        }
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
    public function Register()
    {
        require_once 'views/Auth/Register.php';
    }
    public function postRegister()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $fullname = trim($_POST['fullname']);
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);
            $confirm_password = trim($_POST['confirm_password']);
            $address = trim($_POST['address']);
            $phone_number = trim($_POST['phone_number']);
            $role_id = 2;

            $errors = [];

            // Kiểm tra họ tên
            if (empty($fullname)) {
                $errors['fullname'] = 'Không được để trống họ tên.';
            }

            // Kiểm tra email
            if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = 'Email không hợp lệ.';
            }

            // Kiểm tra mật khẩu
            if (empty($password) || strlen($password) < 6) {
                $errors['password'] = 'Mật khẩu phải có ít nhất 6 ký tự.';
            }

            // Kiểm tra xác nhận mật khẩu
            if ($password !== $confirm_password) {
                $errors['confirm_password'] = 'Mật khẩu xác nhận không khớp.';
            }

            // Kiểm tra số điện thoại
            if (empty($phone_number) || !preg_match('/^[0-9]{10,}$/', $phone_number)) {
                $errors['phone_number'] = 'Số điện thoại không hợp lệ.';
            }

            if (empty($errors)) {
                // Mã hóa mật khẩu
                $hashed_password = password_hash($password, PASSWORD_BCRYPT);

                // Thêm người dùng vào cơ sở dữ liệu
                $this->modelUserClient->insertUserClient(
                    $fullname,
                    $email,
                    $hashed_password,
                    $address,
                    $phone_number,
                    $role_id
                );

                // Chuyển hướng về trang đăng nhập
                header("Location: " . BASE_URL . '?act=login');
                exit();
            } else {
                // Hiển thị lại form với thông báo lỗi
                require_once './views/Auth/Register.php';
            }
        }
    }


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
                header("Location:" . BASE_URL . '?act=login');
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
            header("Location:" . BASE_URL . '?act=login');
        }
    }

    public function listProductByCategory()
    {
        $categoryId = $_GET['id'] ?? null;

        if ($categoryId) {
            $productModel = new Product();
            $listProduct = $productModel->getProductsByCategory($categoryId);
            // Thêm danh sách sản phẩm vào view
            include 'views/LayoutClient/listProduct.php'; // Bạn sẽ tạo file này trong bước sau
        } else {
            // Nếu không có id danh mục, chuyển hướng về trang khác
            header('Location: ' . BASE_URL . '?act=homepage');
            exit;
        }
    }
}
