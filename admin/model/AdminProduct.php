<?php
class AdminProduct
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
    public function getAllProduct()
    {
        try {
            $sql = 'SELECT * FROM product';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (\Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }
    public function insertProduct($title, $category_id, $price, $discount, $thumbnail, $description, $created_at, $updated_at)
    {
        try {
            $sql = 'INSERT INTO product (title,category_id, price, discount, thumbnail, description,created_at,updated_at)
         VALUES (:title,:category_id, :price, :discount, :thumbnail, :description,:created_at,:updated_at )';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':title' => $title,
                ':category_id' => $category_id,
                ':price' => $price,
                ':discount' => $discount,
                ':thumbnail' => $thumbnail,
                ':description' => $description,
                ':created_at' => $created_at,
                ':updated_at' => $updated_at
            ]);
            return true;
        } catch (\Exception $e) {
            echo "Lỗi" . $e->getMessage();
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

    public function destroyProduct($id)
    {
        try {
            $sql = 'DELETE FROM product WHERE id =:id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':id' => $id

            ]);
            return true;
        } catch (\Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }

    //show
    public function getProduct($id)
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
    //EDIT
    public function getDetail($id)
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

    public function updateProduct($id, $title, $price, $discount, $thumbnail, $description)
    {
        try {
            $sql = 'UPDATE product SET title = :title, price = :price, discount = :discount, thumbnail = :thumbnail, description = :description  WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':title' => $title,
                ':price' => $price,
                ':discount' => $discount,
                ':thumbnail' => $thumbnail,
                ':description' => $description,
                ':id' => $id

            ]);
            return true;
        } catch (\Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }
}
