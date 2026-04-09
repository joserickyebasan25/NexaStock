<?php
include('../classes/Users.php');

header('Content-Type: application/json');

$users = new Users();

if (isset($_POST['login'])) {

    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if ($email === '' && $password === '') {
        echo json_encode([
            'status' => 'error',
            'message' => 'Email and Password are required'
        ]);
        exit;
    }

    if ($email === '') {
        echo json_encode([
            'status' => 'error',
            'message' => 'Email is required'
        ]);
        exit;
    }

    if ($password === '') {
        echo json_encode([
            'status' => 'error',
            'message' => 'Password is required'
        ]);
        exit;
    }

    // 🔐 Login
    $login = $users->login($email, $password);

    if ($login === 2) {
        echo json_encode([
            'status' => 'error',
            'message' => 'User not found'
        ]);
    } 
    else if ($login === 3) {
        echo json_encode([
            'status' => 'error',
            'message' => 'Wrong password'
        ]);
    } 
    else {
        echo json_encode([
            'status' => 'success',
            'redirect' => $login
        ]);
    }

    exit;
}