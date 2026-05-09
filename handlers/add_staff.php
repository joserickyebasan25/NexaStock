<?php
include('../classes/Users.php');
header('Content-Type: application/json');

$users = new Users();
$action = $_POST['action'] ?? '';

function uploadStaffPhoto($fieldName = 'photo') {
    if (!isset($_FILES[$fieldName]) || $_FILES[$fieldName]['error'] === UPLOAD_ERR_NO_FILE) {
        return null;
    }

    if ($_FILES[$fieldName]['error'] !== UPLOAD_ERR_OK) {
        throw new Exception('Photo upload failed.');
    }

    if ($_FILES[$fieldName]['size'] > 2 * 1024 * 1024) {
        throw new Exception('Photo must be 2MB or smaller.');
    }

    $allowed = [
        'image/jpeg' => 'jpg',
        'image/png' => 'png',
        'image/webp' => 'webp',
        'image/gif' => 'gif'
    ];

    $mime = mime_content_type($_FILES[$fieldName]['tmp_name']);
    if (!isset($allowed[$mime])) {
        throw new Exception('Only JPG, PNG, WEBP, and GIF photos are allowed.');
    }

    $uploadDir = dirname(__DIR__) . '/uploads/staff';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0775, true);
    }

    $filename = uniqid('staff_', true) . '.' . $allowed[$mime];
    $target = $uploadDir . '/' . $filename;

    if (!move_uploaded_file($_FILES[$fieldName]['tmp_name'], $target)) {
        throw new Exception('Could not save uploaded photo.');
    }

    return '/NexaStock/uploads/staff/' . $filename;
}

try {
    if ($action !== 'add') {
        echo json_encode(['success' => false, 'message' => 'Invalid action.']);
        exit;
    }

    $fname = trim($_POST['fname'] ?? '');
    $lname = trim($_POST['lname'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $role = $_POST['role'] ?? 'staff';

    if ($fname === '' || $lname === '' || $email === '' || $password === '') {
        echo json_encode(['success' => false, 'message' => 'Please complete all required fields.']);
        exit;
    }

    $photo = uploadStaffPhoto();
    $saved = $users->addStaff($fname, $lname, $email, $password, $role, $photo);

    echo json_encode([
        'success' => $saved,
        'message' => $saved ? 'Staff added successfully.' : 'Could not add staff.'
    ]);
} catch (Exception $e) {
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}
