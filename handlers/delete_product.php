<?php
include('../classes/Users.php');
header('Content-Type: application/json');

$usersObj = new Users();
$action = $_POST['action'] ?? '';

try {
    if ($action !== 'delete') {
        echo json_encode(['success' => false, 'message' => 'Invalid action.']);
        exit;
    }

    $id = (int)($_POST['id'] ?? 0);
    $deleted = $id > 0 && $usersObj->deleteProduct($id);

    echo json_encode([
        'success' => $deleted,
        'message' => $deleted ? 'Product deleted successfully.' : 'Could not delete product.'
    ]);
} catch (Throwable $e) {
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}
