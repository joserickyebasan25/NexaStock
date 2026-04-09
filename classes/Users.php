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

    public function getAllStaff() {
    $conn = $this->connect();
    $result = $conn->query("SELECT * FROM users ORDER BY id DESC");
    return $result;
    }

    public function addStaff($fname, $lname, $email, $password, $role) {
        $conn = $this->connect();

        $hashed = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("INSERT INTO users (first_name,last_name,email,password,role) VALUES (?,?,?,?,?)");
        $stmt->bind_param("sssss", $fname, $lname, $email, $hashed, $role);

        return $stmt->execute();
    }

    public function updateStaff($id, $fname, $lname, $email, $role, $password=null) {
        $conn = $this->connect();
        if($password){
            $hashed = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("UPDATE users SET first_name=?, last_name=?, email=?, role=?, password=? WHERE id=?");
            $stmt->bind_param("sssssi", $fname,$lname,$email,$role,$hashed,$id);
        } else {
            $stmt = $conn->prepare("UPDATE users SET first_name=?, last_name=?, email=?, role=? WHERE id=?");
            $stmt->bind_param("ssssi", $fname,$lname,$email,$role,$id);
        }
        return $stmt->execute();
    }

    public function deleteStaff($id) {
        $conn = $this->connect();
        $stmt = $conn->prepare("DELETE FROM users WHERE id=?");
        $stmt->bind_param("i", $id);

        return $stmt->execute();
    }

    public function getAllProducts() {
    $conn = $this->connect();
    $sql = "SELECT * FROM products ORDER BY id DESC";
    return $conn->query($sql);
    }
}