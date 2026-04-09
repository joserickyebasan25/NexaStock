<?php
require_once('Connection.php');

class Users extends Dbh
{
    public function login($email, $password) {
        $conn = $this->connect();

        $stmt = $conn->prepare("SELECT * FROM users WHERE email=? LIMIT 1");
        $stmt->bind_param("s", $email);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows == 0) return 2; // user not found

        $user = $result->fetch_assoc();

        if (!password_verify($password, $user['password'])) return 3; // wrong password

        if(session_status() === PHP_SESSION_NONE) session_start();

        $_SESSION['id'] = $user['id'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['role'] = $user['role'];

        return ($user['role'] === 'admin') 
            ? '/NexaStock/public/Admin/home.php' 
            : '/NexaStock/public/Staff/home.php';
    }
}