<?php
class Product
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function getAllProduct()
    {
        try {
            // Sửa lại câu lệnh SQL với điều kiện JOIN đúng
            $sql = 'SELECT product.*, category.name AS category_name 
                    FROM product 
                    INNER JOIN category ON product.category_id = category.id';

            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            // Lấy tất cả kết quả từ truy vấn và trả về dưới dạng mảng
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Kiểm tra kết quả, nếu không có sản phẩm thì trả về mảng rỗng
            return $result ? $result : [];
        } catch (Exception $e) {
            echo 'Lỗi: ' . $e->getMessage();
            return [];
        }
    }

    public function getDetailProduct($id)
    {
        try {
            $sql = 'SELECT * FROM product WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id
            ]);
            return $stmt->fetch();
        } catch (\Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }
    public function getProductById($product_id)
    {
        $sql = 'SELECT * FROM Product WHERE id = :id';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id' => $product_id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getProductsByCategory($categoryId)
    {
        try {
            $sql = 'SELECT product.*, category.name AS category_name 
                    FROM product 
                    INNER JOIN category ON product.category_id = category.id 
                    WHERE product.category_id = :category_id';

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':category_id' => $categoryId]);

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo 'Lỗi: ' . $e->getMessage();
            return [];
        }
    }
}
