<?php
session_start();
// Require file Common
require_once '../commons/env.php'; // Khai báo biến môi trường
require_once '../commons/function.php'; // Hàm hỗ trợ



// Require toàn bộ file Controllers
require_once './controllers/AdminCategoryController.php';
require_once './controllers/AdminUserController.php';
require_once './controllers/AdminProductController.php';
require_once './controllers/AdminOrderController.php';

// Require toàn bộ file Models
require_once './model/AdminCategory.php';
require_once './model/AdminUser.php';
require_once './model/AdminProduct.php';
require_once './model/AdminOrder.php';

// Route
$act = $_GET['act'] ?? '/';

if ($act !== 'login-admin' && $act !== 'check-login-admin' && $act !== 'logout-admin') {
    checkLoginAdmin();
}

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match
match ($act) {

    // quản lý admin
    'user' => (new AdminUserController())->user(),
    'form-add-user' => (new AdminUserController())->formAddUser(),
    'add-user' => (new AdminUserController())->postAddUser(),
    'form-edit-user' => (new AdminUserController())->formEditUser(),
    'edit-user' => (new AdminUserController())->postEditUser(),
    'delete-user' => (new AdminUserController())->deleteUser(),
    'show-user' => (new AdminUserController())->showUser(),
    //
    'reset-password' => (new AdminUserController())->resetPassword(),
    'edit-password'  => (new AdminUserController())->postEditPassword(),
    // Quản lý client

    'client' => (new AdminUserController())->client(),
    'form-edit-client' => (new AdminUserController())->formEditClient(),
    'edit-client' => (new AdminUserController())->postEditClient(),
    'show-client' => (new AdminUserController())->showClient(),


    //Auth
    'login-admin' => (new AdminUserController())->formLogin(),
    'check-login-admin' => (new AdminUserController())->login(),
    'logout-admin' => (new AdminUserController())->Logout(),
    //Product
    'product' => (new AdminProductController())->product(),
    'form-add-product' => (new AdminProductController())->formAddProduct(),
    'add-product' => (new AdminProductController())->postAddProduct(),
    'delete-product' => (new AdminProductController())->deleteProduct(),
    'show-product' => (new AdminProductController())->showProduct(),
    'edit-product' => (new AdminProductController())->postEditProduct(),
    'form-edit-product' => (new AdminProductController())->formEditProduct(),
    //Category
    'category' => (new AdminCategoryController())->listCategory(),
    'form-add-category' => (new AdminCategoryController())->formAddCategory(),
    'add-category' => (new AdminCategoryController())->postAddCategory(),
    'form-edit-category' => (new AdminCategoryController())->formEditCategory(),
    'edit-category' => (new AdminCategoryController())->postEditCategory(),
    'delete-category' => (new AdminCategoryController())->deleteCategory(),
    //oder
    'order' => (new AdminOrderController())->order(),

    'delete-order' => (new AdminOrderController())->deleteOrder(),
    'show-order' => (new AdminOrderController())->showOrder(),
    'edit-order' => (new AdminOrderController())->postEditOrder(),
    'form-edit-order' => (new AdminOrderController())->formEditOrder(),
};
