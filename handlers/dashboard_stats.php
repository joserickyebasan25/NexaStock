<?php
include('../classes/Users.php');
header('Content-Type: application/json');

$usersObj = new Users();
$action = $_POST['action'] ?? $_GET['action'] ?? '';

try {
    if ($action !== 'fetch') {
        echo json_encode(['success' => false, 'message' => 'Invalid action.']);
        exit;
    }

    echo json_encode(['success' => true, 'data' => $usersObj->getDashboardStats()]);
} catch (Throwable $e) {
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}
