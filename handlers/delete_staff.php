<?php
include('../classes/Users.php');
header('Content-Type: application/json');

$users = new Users();
$action = $_POST['action'] ?? '';

function deleteLocalPhoto($photoPath) {
    if (!$photoPath || strpos($photoPath, '/NexaStock/uploads/staff/') !== 0) {
        return;
    }

    $localPath = dirname(__DIR__) . str_replace('/NexaStock', '', $photoPath);
    if (is_file($localPath)) {
        unlink($localPath);
    }
}

if ($action !== 'delete') {
    echo json_encode(['success' => false, 'message' => 'Invalid action.']);
    exit;
}

$id = (int)($_POST['id'] ?? 0);
if ($id <= 0) {
    echo json_encode(['success' => false, 'message' => 'Invalid staff ID.']);
    exit;
}

$existing = $users->getStaffById($id);
$deleted = $users->deleteStaff($id);

if ($deleted && !empty($existing['photo'])) {
    deleteLocalPhoto($existing['photo']);
}

echo json_encode([
    'success' => $deleted,
    'message' => $deleted ? 'Staff deleted successfully.' : 'Could not delete staff.'
]);
