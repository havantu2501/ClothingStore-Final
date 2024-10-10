<?php
class AdminOrder
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }

    // Lấy tất cả đơn hàng
    public function getAllOrders()
    {
        try {
            $sql = 'SELECT * FROM orders';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
    public function getAllStatusOder()
    {
        try {
            $sql = 'SELECT * FROM status_orders';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }

    // Lấy chi tiết đơn hàng theo ID
    public function getOrderDetail($id)
    {
        try {
            $sql = 'SELECT orders.*, status_orders.status_name 
            FROM orders
            INNER JOIN status_orders ON orders.id = status_orders.id
             WHERE orders.id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id
            ]);
            return $stmt->fetch();
        } catch (\Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }

    public function getListProductOrder($id)
    {
        try {
            $sql = 'SELECT * FROM order_details
             WHERE order_id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id
            ]);
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }

    // Cập nhật thông tin đơn hàng
    public function updateOrder($id, $fullname, $email, $phone_number, $address, $notes, $status_id, $total_money)
    {
        try {
            // Cập nhật thời gian đặt hàng
            $order_date = date('Y-m-d H:i:s');

            $sql = 'UPDATE orders SET fullname = :fullname, email = :email, phone_number = :phone_number, 
                address = :address, notes = :notes, status_id = :status_id, total_money = :total_money, 
                order_date = :order_date WHERE id = :id'; // Cập nhật thời gian đặt hàng
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':fullname' => $fullname,
                ':email' => $email,
                ':phone_number' => $phone_number,
                ':address' => $address,
                ':notes' => $notes,
                ':status_id' => $status_id,
                ':total_money' => $total_money,
                ':order_date' => $order_date, // Truyền thời gian đặt hàng
                ':id' => $id
            ]);
            return true;
        } catch (\Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }


    // Xóa đơn hàng
    public function deleteOrder($id)
    {
        try {
            $sql = 'DELETE FROM orders WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id
            ]);
            return true;
        } catch (\Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
}
