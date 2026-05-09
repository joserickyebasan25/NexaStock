<?php
include('../classes/Users.php');
header('Content-Type: application/json');

$users = new Users();
$action = $_POST['action'] ?? '';

if($action == 'fetch'){
    $data = $users->getAllStaff();
    $staff = [];

    if($data->num_rows > 0){
        while($row = $data->fetch_assoc()){
            $staff[] = $row;
        }
    }

    echo json_encode($staff);
    exit;
}