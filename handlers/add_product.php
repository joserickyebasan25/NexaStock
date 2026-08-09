<?php
include '../classes/Users.php';
header('Content-Type: application/json');

session_start();

// CSRF protection
if (empty($_POST['csrf_token']) || !hash_equals($_SESSION['csrf_token'] ?? '', $_POST['csrf_token'])) {
    echo json_encode(['success' => false, 'message' => 'Invalid CSRF token.']);
    exit;
}

$usersObj = new Users();
$action = $_POST['action'] ?? '';

try {
    if ($action !== 'add') {
        echo json_encode(['success' => false, 'message' => 'Invalid action.']);
        exit;
    }

    $productName = trim($_POST['product_name'] ?? '');
    $sku = trim($_POST['sku'] ?? '');
    $category = trim($_POST['category'] ?? '');
    $price = (float)($_POST['price'] ?? 0);
    $stock = (int)($_POST['stock'] ?? 0);

    if ($productName === '' || $category === '') {
        echo json_encode(['success' => false, 'message' => 'Product name and category are required.']);
        exit;
    }

    if ($price < 0 || $stock < 0) {
        echo json_encode(['success' => false, 'message' => 'Price and stock cannot be negative.']);
        exit;
    }

    $saved = $usersObj->addProduct($productName, $sku, $category, $price, $stock);

    echo json_encode([
        'success' => $saved,
        'message' => $saved ? 'Product added successfully.' : 'Could not add product.'
    ]);
} catch (Throwable $e) {
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}
