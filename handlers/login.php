<?php
include('../classes/Users.php');

header('Content-Type: application/json'); // Force JSON output

$users = new Users();

if (isset($_POST['login'])) {
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if ($email === '' || $password === '') {
        echo json_encode(['error' => 'All fields required']);
        exit;
    }

    $login = $users->login($email, $password);

    if ($login === 2) {
        echo json_encode(['error' => 'User not found']);
    } else if ($login === 3) {
        echo json_encode(['error' => 'Wrong password']);
    } else {
        echo json_encode(['redirect' => $login]);
    }

    exit;
}