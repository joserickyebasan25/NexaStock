<?php
include('../classes/Users.php');
header('Content-Type: application/json');

$usersObj = new Users();
$action = $_POST['action'] ?? '';

if ($action === 'fetch') {
    $result = $usersObj->getAllProducts();
    $products = [];

    if ($result && $result->num_rows > 0) {
        while($row = $result->fetch_assoc()){
            $products[] = $row;
        }
    }

    echo json_encode($products);
    exit;
}