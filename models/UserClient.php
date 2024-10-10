<?php

class UserClient
{
    public $conn;
    public function __construct()
    {
        $this->conn = connectDB();
    }
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
                if ($user['role_id'] == 2) {
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
    public function getUserFromEmail($email)
    {
        try {
            $sql = 'SELECT * FROM user WHERE email = :email';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':email' => $email
            ]);
            return $stmt->fetch();
        } catch (\Exception $e) {
            echo "Lỗi" . $e->getMessage();
        }
    }
}
