<?php
include('../classes/Users.php');
header('Content-Type: application/json');

$usersObj = new Users();
$action = $_POST['action'] ?? '';

function rowsToArray($result) {
    $items = [];

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $items[] = $row;
        }
    }

    return $items;
}

try {
    if ($action !== 'fetch') {
        echo json_encode(['success' => false, 'message' => 'Invalid action.']);
        exit;
    }

    echo json_encode(rowsToArray($usersObj->getStockMovements()));
} catch (Throwable $e) {
    echo json_encode([]);
}
