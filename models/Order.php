<?php
class Order
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function addOrder($user_id, $fullname, $address, $phone_number, $email, $notes, $total_money, $order_date, $status_id, $order_code)
    {
        try {

            $sql = 'INSERT INTO orders (user_id, fullname, address, phone_number, email, notes, total_money, order_date, status_id, order_code) 
            VALUES (:user_id, :fullname, :address, :phone_number, :email, :notes, :total_money, :order_date, :status_id, :order_code)';


            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':user_id' => $user_id,
                ':fullname' => $fullname,
                ':address' => $address,
                ':phone_number' => $phone_number,
                ':email' => $email,
                ':notes' => $notes,
                ':total_money' => $total_money,
                ':order_date' => $order_date,
                ':status_id' => $status_id,
                ':order_code' => $order_code,
            ]);

            return $this->conn->lastInsertId();
        } catch (Exception $e) {
            echo 'Lỗi: ' . $e->getMessage();
            return [];
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

    // Lấy chi tiết đơn hàng theo user ID
    public function getOrderDetailByEmail($email)
    {
        try {
            // Kiểm tra xem email có tồn tại hay không
            if (empty($email)) {
                throw new \Exception("Email không hợp lệ.");
            }

            $sql = 'SELECT orders.*, status_orders.status_name 
                    FROM orders
                    INNER JOIN status_orders ON orders.status_id = status_orders.id
                    INNER JOIN user ON orders.user_id = user.id
                    WHERE user.email = :email';

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':email' => $email // Sử dụng email để lấy đơn hàng
            ]);

            return $stmt->fetchAll(); // Trả về tất cả đơn hàng của người dùng
        } catch (\Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }




    public function getListProductOrder($id)
    {
        try {
            $sql = 'SELECT * FROM orders
             WHERE user_id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id
            ]);
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
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
    public function updateOrderStatus($orderId, $newStatusId)
    {
        try {
            // Kiểm tra các giá trị đầu vào
            if (empty($orderId) || empty($newStatusId)) {
                throw new \Exception("ID đơn hàng hoặc trạng thái không hợp lệ.");
            }

            // SQL để cập nhật trạng thái
            $sql = 'UPDATE orders SET status_id = :status_id WHERE id = :order_id';
            $stmt = $this->conn->prepare($sql);

            // Thực thi truy vấn
            $stmt->execute([
                ':status_id' => $newStatusId,
                ':order_id' => $orderId
            ]);

            // Kiểm tra số dòng đã được cập nhật
            if ($stmt->rowCount() > 0) {
                return true; // Cập nhật thành công
            } else {
                return false; // Không có gì để cập nhật
            }
        } catch (\Exception $e) {
            echo "Lỗi: " . $e->getMessage();
            return false; // Trả về false nếu có lỗi
        }
    }
    //

    public function addOrder_details($order_id,  $product_id, $price,  $quantity, $total_money, $cart_id)
    {

        $sql = 'INSERT INTO order_details (order_id, product_id, price, quantity, total_money, cart_id)
            VALUES(:order_id, :product_id, :price, :quantity, :total_money, :cart_id)';

        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':order_id' => $order_id,
            ':product_id' => $product_id,
            ':price' => $price,
            ':quantity' => $quantity,
            ':total_money' => $total_money,
            ':cart_id' => $cart_id
        ]);
        return $this->conn->lastInsertId();
    }
}
