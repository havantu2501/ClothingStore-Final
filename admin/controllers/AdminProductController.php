<?php


class AdminProductController
{
    public $modelProduct;
    public $modelCategory;
    public function __construct()
    {
        $this->modelProduct = new AdminProduct();
        $this->modelCategory = new AdminCategory();
    }

    public function product()
    {
        $listProduct = $this->modelProduct->getAllProduct();
        require_once './views/danhmuc/Product.php';
    }

    //Show
    public function ShowProduct()
    {
        $id = $_GET['id_product'];
        $product = $this->modelProduct->getProduct($id);
        if ($product) {
            require_once './views/danhmuc/showProduct.php';
        } else {
            header("Location: " . BASE_URL_ADMIN . '?act=user');
            exit();
        }
    }

    public function formAddProduct()
    {
        $listCategory_id = $this->modelCategory->getAllCategory();
        // $listCategory = $categoryModel->getAllCategory(); // Lấy danh mục t
        require_once './views/danhmuc/addProduct.php';
    }

    public function postAddProduct()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $title = $_POST['title'];
            $price = $_POST['price'];
            $discount = $_POST['discount'];
            $description = $_POST['description'];
            $category_id = $_POST['category_id'];
            $thumbnail = $_FILES['thumbnail'];
            // Kiểm tra nếu trường 'created_at' và 'updated_at' tồn tại
            $created_at = isset($_POST['created_at']) ? $_POST['created_at'] : date('Y-m-d');
            $updated_at = isset($_POST['updated_at']) ? $_POST['updated_at'] : date('Y-m-d');



            // $file_thumb = uploadFile1($thumbnail, './uploads/');
            $foderupload = './uploads/';
            $pathStorage = $foderupload . time() . $thumbnail['name'];
            $from = $thumbnail['tmp_name'];
            $to = PATH_ROOT . $pathStorage;
            if (move_uploaded_file($from, $to)) {
                $file_thumb =  $pathStorage;
            }

            //mảng hình ảnh
            $img_array = $_FILES['img_array'];

            $errors = [];
            if (empty($title)) {
                $errors['title'] = 'Ko để trống';
            }
            if (empty($category_id)) {
                echo "Lỗi: Vui lòng chọn danh mục.";
                return;
            }
            // var_dump($errors);die;   

            if (empty($errors)) {
                $status = $this->modelProduct->insertProduct($title, $category_id, $price, $discount, $file_thumb, $description, $created_at, $updated_at);
                var_dump($status);

                header("Location: " . BASE_URL_ADMIN . '?act=product');
                exit();
            } else {
                require_once './views/danhmuc/addProduct.php';
            }
        }
    }
    public function deleteProduct()
    {
        $id = $_GET['id_product'];
        $user = $this->modelProduct->getDetailProduct($id);

        if ($user) {
            $this->modelProduct->destroyProduct($id);
        }
        header("Location: " . BASE_URL_ADMIN . '?act=product');
        exit();
    }

    // EDIT
    public function formEditProduct()
    {
        $id = $_GET['id_product'];
        $product = $this->modelProduct->getDetail($id);
        if ($product) {
            require_once './views/danhmuc/editProduct.php';
        } else {
            header("Location: " . BASE_URL_ADMIN . '?act=product');
            exit();
        }
    }
    public function postEditProduct()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $title = $_POST['title'];
            $price = $_POST['price'];
            $discount = $_POST['discount'];
            $thumbnail = $_FILES['thumbnail'];
            $description = $_POST['description'];
            // var_dump($thumbnail);die;

            // var_dump($title);die;
            // Kiểm tra nếu có upload ảnh mới
            if ($thumbnail['error'] === 0) { // 0 nghĩa là có file mới được upload
                // Upload ảnh mới
                $file_thumb = uploadfile($thumbnail, './uploads/');
            } else {
                // Nếu không upload ảnh mới, giữ lại ảnh cũ từ database
                $file_thumb = $_POST['current_thumbnail'];
            }

            $errors = [];
            if (empty($title)) {
                $errors['title'] = 'Ko để trống';
            }

            if (empty($errors)) {
                $this->modelProduct->updateProduct($id, $title, $price, $discount, $file_thumb, $description);
                header("Location: " . BASE_URL_ADMIN . '?act=product');
                exit();
            } else {
                $product = ['id' => $id, 'title' => $title, 'price' => $price, 'discount' => $discount, 'thumbnail' => $thumbnail, 'description' => $description];
                require_once './views/danhmuc/editProduct.php';
            }
        }
    }
}
