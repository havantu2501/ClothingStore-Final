<?php

// Biến môi trường, dùng chung toàn hệ thống
// Khai báo dưới dạng HẰNG SỐ để không phải dùng $GLOBALS

define('BASE_URL', 'http://localhost/clothingstore/');
define('BASE_URL_ADMIN', 'http://localhost/clothingstore/admin/');


define('DB_HOST', 'localhost');
define('DB_PORT', 3306);
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'clothingstore');  // Tên database

define('PATH_ROOT', __DIR__ . '/../');
function checkLoginAdmin()
{
    if (!isset($_SESSION['user_admin'])) {
        // header("Location: " . BASE_URL_ADMIN . '?act=login-admin');

        require_once './views/auth/formLogin.php';
        exit();
    }
}
