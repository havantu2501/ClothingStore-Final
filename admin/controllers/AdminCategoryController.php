<?php

class AdminCategoryController
{
    public $modelCategory;

    public function __construct()
    {
        $this->modelCategory = new AdminCategory();
    }

    // Hiển thị danh sách danh mục
    public function listCategory()
    {
        $listCategory = $this->modelCategory->getAllCategory();
        require_once './views/danhmuc/Category.php';
    }

    // Hiển thị form thêm danh mục
    public function formAddCategory()
    {
        require_once './views/danhmuc/addCategory.php';
    }

    // Xử lý thêm danh mục
    public function postAddCategory()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];

            // Kiểm tra lỗi
            $errors = [];
            if (empty($name)) {
                $errors['name'] = 'Tên danh mục không được để trống';
            }

            if (empty($errors)) {
                $status = $this->modelCategory->insertCategory($name);
                if ($status) {
                    header("Location: " . BASE_URL_ADMIN . '?act=category');
                    exit();
                } else {
                    echo "Lỗi khi thêm danh mục!";
                }
            } else {
                require_once './views/danhmuc/addCategory.php';
            }
        }
    }

    // Hiển thị form chỉnh sửa danh mục
    public function formEditCategory()
    {
        $id = $_GET['id_category'];
        $category = $this->modelCategory->getDetailCategory($id);
        require_once './views/danhmuc/editCategory.php';
    }

    // Xử lý chỉnh sửa danh mục
    public function postEditCategory()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $name = $_POST['name'];

            // Kiểm tra lỗi
            $errors = [];
            if (empty($name)) {
                $errors['name'] = 'Tên danh mục không được để trống';
            }

            if (empty($errors)) {
                $status = $this->modelCategory->updateCategory($id, $name);
                if ($status) {
                    header("Location: " . BASE_URL_ADMIN . '?act=category');
                    exit();
                } else {
                    echo "Lỗi khi cập nhật danh mục!";
                }
            } else {
                // Nếu có lỗi, hiển thị lại form chỉnh sửa
                $category = $this->modelCategory->getDetailCategory($id); // Lấy lại thông tin danh mục
                require_once './views/danhmuc/editCategory.php';
            }
        }
    }

    // Xóa danh mục
    public function deleteCategory()
    {
        if (isset($_GET['id_category'])) {
            $id = $_GET['id_category'];
            $this->modelCategory->destroyCategory($id);
            header("Location: " . BASE_URL_ADMIN . '?act=category');
            exit();
        } else {
            echo "ID không hợp lệ!";
        }
    }





    // Hiển thị chi tiết danh mục
    public function showCategory()
    {
        $id = $_GET['id_category'];
        $category = $this->modelCategory->getDetailCategory($id);
        require_once './views/danhmuc/showCategory.php';
    }
}
