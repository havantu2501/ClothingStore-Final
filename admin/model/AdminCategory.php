<?php

class AdminCategory
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    // Lấy tất cả danh mục
    public function getAllCategory()
    {
        try {
            $sql = 'SELECT id, name FROM category';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
            return []; // Trả về mảng rỗng nếu có lỗi
        }
    }

    // Thêm danh mục
    // Chỉ thêm tên mà không cần chỉ định id
    public function insertCategory($name)
    {
        // Validate the input
        if (empty($name)) {
            echo "Lỗi: Tên danh mục không được để trống.";
            return false;
        }

        try {
            $sql = 'INSERT INTO category (name) VALUES (:name)';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->execute();
            return true;  // Trả về true nếu thêm thành công
        } catch (PDOException $e) {
            echo "Lỗi cơ sở dữ liệu: " . $e->getMessage(); // Xuất lỗi nếu có
            return false; // Trả về false nếu thêm không thành công
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage(); // Xuất lỗi nếu có
            return false; // Trả về false nếu thêm không thành công
        }
    }



    // Lấy chi tiết danh mục
    public function getDetailCategory($id)
    {
        try {
            $sql = 'SELECT id, name FROM category WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
            return null; // Trả về null nếu có lỗi
        }
    }

    // Cập nhật danh mục
    public function updateCategory($id, $name)
    {
        try {
            $sql = 'UPDATE category SET name = :name WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':name' => $name, ':id' => $id]);
            return true;
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
            return false; // Trả về false nếu có lỗi
        }
    }

    // Xóa danh mục
    public function destroyCategory($id)
    {
        try {
            $sql = 'DELETE FROM category WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);
            return true;
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
}
