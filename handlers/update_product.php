<?php
include('../classes/Users.php');
header('Content-Type: application/json');

$usersObj = new Users();
$action = $_POST['action'] ?? '';

try {
    if ($action !== 'update') {
        echo json_encode(['success' => false, 'message' => 'Invalid action.']);
        exit;
    }

    $id = (int)($_POST['id'] ?? 0);
    $productName = trim($_POST['product_name'] ?? '');
    $sku = trim($_POST['sku'] ?? '');
    $category = trim($_POST['category'] ?? '');
    $price = (float)($_POST['price'] ?? 0);
    $stock = (int)($_POST['stock'] ?? 0);

    if ($id <= 0 || $productName === '' || $category === '') {
        echo json_encode(['success' => false, 'message' => 'Product name and category are required.']);
        exit;
    }

    if ($price < 0 || $stock < 0) {
        echo json_encode(['success' => false, 'message' => 'Price and stock cannot be negative.']);
        exit;
    }

    $saved = $usersObj->updateProduct($id, $productName, $sku, $category, $price, $stock);

    echo json_encode([
        'success' => $saved,
        'message' => $saved ? 'Product updated successfully.' : 'Could not update product.'
    ]);
} catch (Throwable $e) {
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}
