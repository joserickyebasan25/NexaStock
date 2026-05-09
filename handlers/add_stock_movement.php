<?php
include('../classes/Users.php');
header('Content-Type: application/json');

$usersObj = new Users();
$action = $_POST['action'] ?? '';

try {
    if ($action !== 'move_stock') {
        echo json_encode(['success' => false, 'message' => 'Invalid action.']);
        exit;
    }

    $productId = (int)($_POST['product_id'] ?? 0);
    $type = $_POST['movement_type'] ?? 'in';
    $quantity = (int)($_POST['quantity'] ?? 0);
    $notes = trim($_POST['notes'] ?? '');
    $movementDate = $_POST['movement_date'] ?? date('Y-m-d');

    if ($productId <= 0 || !in_array($type, ['in', 'out'], true) || $quantity <= 0) {
        echo json_encode(['success' => false, 'message' => 'Please select a product, movement type, and valid quantity.']);
        exit;
    }

    $saved = $usersObj->recordStockMovement($productId, $type, $quantity, $notes, $movementDate, $_POST['created_by'] ?? null);

    echo json_encode([
        'success' => $saved,
        'message' => $saved ? 'Stock movement recorded successfully.' : 'Could not record movement. Check available stock.'
    ]);
} catch (Throwable $e) {
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}
