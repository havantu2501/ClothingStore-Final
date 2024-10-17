<?php

class Cart
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getCartFromUser($id)
    {
        try {

            $sql = 'SELECT * FROM cart WHERE user_id = :user_id AND soft_delete = :soft_delete';

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':user_id' => $id,
                ':soft_delete' => 0
            ]);

            return $stmt->fetch();
        } catch (Exception $e) {
            echo 'Lỗi: ' . $e->getMessage();
            return [];
        }
    }

    public function getDetailCart($id)
    {
        try {

            $sql = 'SELECT cart_details.*, product.title, product.thumbnail, product.price, product.discount
            FROM cart_details
            left JOIN product ON cart_details.product_id = product.id
             WHERE cart_details.cart_id = :cart_id';

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':cart_id' => $id]);

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo 'Lỗi: ' . $e->getMessage();
            return [];
        }
    }

    public function addCart($id)
    {
        try {

            $sql = 'INSERT INTO cart (user_id) VALUES (:id)';

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);

            return $this->conn->lastInsertId();
        } catch (Exception $e) {
            echo 'Lỗi: ' . $e->getMessage();
            return [];
        }
    }

    public function updateQuantity($cart_id, $product_id, $quantity)
    {
        try {

            $sql = 'UPDATE cart_details SET quantity = :quantity WHERE cart_id = :cart_id AND product_id = :product_id';

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':cart_id' => $cart_id, ':product_id' => $product_id, ':quantity' => $quantity]);

            return $this->conn->lastInsertId();
        } catch (Exception $e) {
            echo 'Lỗi: ' . $e->getMessage();
            return [];
        }
    }

    public function addDetailCart($cart_id, $product_id, $quantity)
    {
        try {

            $sql = 'INSERT INTO cart_details (cart_id, product_id, quantity)
            VALUES (:cart_id, :product_id, :quantity)';

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':cart_id' => $cart_id, ':product_id' => $product_id, ':quantity' => $quantity]);

            return $this->conn->lastInsertId();
        } catch (Exception $e) {
            echo 'Lỗi: ' . $e->getMessage();
            return [];
        }
    }

    public function removeCart($cart_id, $user_id)
    {
        try {

            $sql = 'UPDATE cart SET soft_delete = :soft_delete WHERE id = :id AND user_id = :user_id';

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $cart_id,
                ':user_id' => $user_id,
                ':soft_delete' => 1
            ]);

            return $this->conn->lastInsertId();
        } catch (Exception $e) {
            echo 'Lỗi: ' . $e->getMessage();
            return [];
        }
    }
}
