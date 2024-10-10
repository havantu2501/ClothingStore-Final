<?php
class AdminUser
{
   public $conn;
   public function __construct()
   {
      $this->conn = connectDB();
   }
   public function getAllUser($role_id)
   {
      try {
         $sql = 'SELECT * FROM user WHERE role_id = :role_id';
         $stmt = $this->conn->prepare($sql);
         $stmt->execute([':role_id' => $role_id]);
         return $stmt->fetchAll();
      } catch (\Exception $e) {
         echo "Lỗi" . $e->getMessage();
      }
   }
   //Show
   public function getUser($id)
   {
      try {
         $sql = 'SELECT * FROM user WHERE id = :id';
         $stmt = $this->conn->prepare($sql);
         $stmt->execute([
            ':id' => $id
         ]);
         return $stmt->fetch();
      } catch (\Exception $e) {
         echo "Lỗi" . $e->getMessage();
      }
   }

   //ADD
   public function insertUser($fullname, $email, $password, $address, $phone_number, $role_id)
   {
      try {
         $sql = 'INSERT INTO user (fullname, email, password, address, phone_number, role_id)
        VALUES (:fullname, :email, :password, :address, :phone_number, :role_id)';
         $stmt = $this->conn->prepare($sql);
         $stmt->execute([
            ':fullname' => $fullname,
            ':email' => $email,
            ':password' => $password,
            ':address' => $address,
            ':phone_number' => $phone_number,
            ':role_id' => $role_id,

         ]);
         return true;
      } catch (\Exception $e) {
         echo "Lỗi" . $e->getMessage();
      }
   }
   //EDIT
   public function getDetailUser($id)
   {
      try {
         $sql = 'SELECT * FROM user WHERE id = :id';
         $stmt = $this->conn->prepare($sql);
         $stmt->execute([
            ':id' => $id
         ]);
         return $stmt->fetch();
      } catch (\Exception $e) {
         echo "Lỗi" . $e->getMessage();
      }
   }

   public function updateUser($id, $fullname, $email, $password, $address, $phone_number, $role_id)
   {
      try {
         $sql = 'UPDATE user SET fullname = :fullname, email = :email, password = :password, address = :address, phone_number = :phone_number, role_id = :role_id WHERE id = :id';
         $stmt = $this->conn->prepare($sql);
         $stmt->execute([
            ':fullname' => $fullname,
            ':email' => $email,
            ':password' => $password,
            ':address' => $address,
            ':phone_number' => $phone_number,
            ':role_id' => $role_id,
            ':id' => $id

         ]);
         return true;
      } catch (\Exception $e) {
         echo "Lỗi" . $e->getMessage();
      }
   }

   //DELETE

   public function destroyUser($id)
   {
      try {
         $sql = 'DELETE FROM user WHERE id =:id';
         $stmt = $this->conn->prepare($sql);
         $stmt->execute([
            ':id' => $id

         ]);
         return true;
      } catch (\Exception $e) {
         echo "Lỗi" . $e->getMessage();
      }
   }
   //

   public function updateclient($id, $fullname, $email, $address, $phone_number)
   {
      try {
         $sql = 'UPDATE user SET fullname = :fullname, email = :email, address = :address, phone_number = :phone_number WHERE id = :id';
         $stmt = $this->conn->prepare($sql);
         $stmt->execute([
            ':fullname' => $fullname,
            ':email' => $email,

            ':address' => $address,
            ':phone_number' => $phone_number,

            ':id' => $id

         ]);
         return true;
      } catch (\Exception $e) {
         echo "Lỗi" . $e->getMessage();
      }
   }
   public function getClient($id)
   {
      try {
         $sql = 'SELECT * FROM user WHERE id = :id';
         $stmt = $this->conn->prepare($sql);
         $stmt->execute([
            ':id' => $id
         ]);
         return $stmt->fetch();
      } catch (\Exception $e) {
         echo "Lỗi" . $e->getMessage();
      }
   }




   //Auth
   public function checkLogin($password, $email)
   {
      try {

         $sql = "SELECT * FROM user WHERE email = :email";
         $stmt = $this->conn->prepare($sql);
         $stmt->execute(['email' => $email]);
         $user = $stmt->fetch();
         // $check = password_verify('123123abc', '$2y$10$VFvQJXmyznPuEEyVVvH.CO3aV');
         // $crypted = password_hash($password, PASSWORD_DEFAULT);

         // var_dump($crypted);
         // die();

         if ($user && password_verify($password, $user['password'])) {
            if ($user['role_id'] == 1) {
               return $user['email'];
            } else {
               return 'Bạn ko có quyền truy cập';
            }
         } else {

            return 'Bạn nhập sai mật khẩu hoặc tài khoản!';
         }
      } catch (\Throwable $e) {
         echo "Lỗi: " . $e->getMessage();
         return false;
      }
   }
   //

   public function resetPassword($id, $password)
   {
      try {
         $sql = 'UPDATE user SET password = :password WHERE id = :id';
         $stmt = $this->conn->prepare($sql);
         $stmt->execute([

            ':password' => $password,
            ':id' => $id

         ]);
         return true;
      } catch (\Exception $e) {
         echo "Lỗi" . $e->getMessage();
      }
   }
}
