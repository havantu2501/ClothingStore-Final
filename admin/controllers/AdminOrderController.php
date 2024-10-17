<?php

class AdminOrderController
{
    public $modelOrder;

    public function __construct()
    {
        $this->modelOrder = new AdminOrder();
    }

    // Hiển thị danh sách đơn hàng
    public function order()
    {
        $listOrder = $this->modelOrder->getAllOrders();
        require_once './views/danhmuc/Order.php';
    }




    // Hiển thị chi tiết đơn hàng
    public function showOrder()
    {
        $id = $_GET['id_order'];
        $order = $this->modelOrder->getOrderDetail($id);
        
        $productOrder = $this->modelOrder->getListProductOrder($id);
        
        $listStatusOder = $this->modelOrder->getAllStatusOder($id);

        require_once './views/danhmuc/showOrder.php';
        // if ($order) {
        //     require_once './views/danhmuc/showOrder.php';
        // } else {
        //     header("Location: " . BASE_URL_ADMIN . '?act=order');
        //     exit();
        // }
    }

    // Xóa đơn hàng
    public function deleteOrder()
    {
        $id = $_GET['id_order'];
        $order = $this->modelOrder->getOrderDetail($id);

        if ($order) {
            $this->modelOrder->deleteOrder($id);
        }
        header("Location: " . BASE_URL_ADMIN . '?act=order');
        exit();
    }

    // Hiển thị form chỉnh sửa đơn hàng
    public function formEditOrder()
    {
        $id = $_GET['id_order'];
        $order = $this->modelOrder->getOrderDetail($id);
        $listStatusOder = $this->modelOrder->getAllStatusOder($id);
        if ($order) {
            require_once './views/danhmuc/editOrder.php';
        } else {
            header("Location: " . BASE_URL_ADMIN . '?act=order');
            exit();
        }
    }

    // Cập nhật thông tin đơn hàng
    public function postEditOrder()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['order_id'];

            $fullname = $_POST['fullname'];
            $email = $_POST['email'];
            $phone_number = $_POST['phone_number'];
            $address = $_POST['address'];
            $notes = $_POST['notes'];
            $status_id = $_POST['status_id'];
            $total_money = $_POST['total_money'];
            // Cập nhật thời gian đặt hàng
            $order_date = date('Y-m-d H:i:s');

            $errors = [];
            if (empty($fullname)) {
                $errors['fullname'] = 'Tên khách hàng không được để trống';
            }

            if (empty($errors)) {
                $this->modelOrder->updateOrder($id, $fullname, $email, $phone_number, $address, $notes, $status_id, $total_money, $order_date);
                header("Location: " . BASE_URL_ADMIN . '?act=order');
                exit();
            } else {
                $order = ['id' => $id, 'fullname' => $fullname, 'email' => $email, 'phone_number' => $phone_number, 'address' => $address, 'notes' => $notes, 'status_id' => $status_id, 'total_money' => $total_money, 'order_date' => $order_date];
                require_once './views/danhmuc/editOrder.php';
            }
        }
    }
}