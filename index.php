<?php
session_start();

// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/HomeController.php';

// Require toàn bộ file Models
require_once './models/UserClient.php';
require_once './models/Product.php';
require_once './models/Cart.php';
require_once './models/Order.php';

// Route
$act = $_GET['act'] ?? '/';

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match
match ($act) {
    // Trang chủ
    '/' => (new HomeController())->home(),
    'homepage' => (new HomeController())->homepage(),
    'productpage' => (new HomeController())->productpage(),
    'contactpage' => (new HomeController())->contactpage(),

    // Auth
    'my-account' => (new HomeController())->myAccount(),
    'login' => (new HomeController())->login(),
    'check-login' => (new HomeController())->postlogin(),
    'logout' => (new HomeController())->Logout(),
    'register' => (new HomeController())->Register(),
    'check-register' => (new HomeController())->postRegister(),
    // default => 'Page not found', // Thêm trường hợp mặc định

    // product
    'detail-product' => (new HomeController())->detailProduct(),
    // cart
    'add-cart' => (new HomeController())->addCart(),
    'cart' => (new HomeController())->Cart(),
    'checkout' => (new HomeController())->checkout(),
    //
    'payment-processing' => (new HomeController())->postCheckout(),
    'category' => (new HomeController())->listProductByCategory(),
};
