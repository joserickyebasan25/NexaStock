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

if($action == 'add' || $action == 'update'){
    $id = $_POST['id'] ?? null;
    $fname = trim($_POST['fname']);
    $lname = trim($_POST['lname']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $role = $_POST['role'];

    if(!$fname || !$lname || !$email || (!$password && !$id)){
        echo json_encode(['status'=>'error','message'=>'All required fields must be filled.']);
        exit;
    }

    if($action == 'add'){
        $result = $users->addStaff($fname,$lname,$email,$password,$role);
        if($result){
            echo json_encode(['status'=>'success','message'=>'Staff added successfully.']);
        } else {
            echo json_encode(['status'=>'error','message'=>'Failed to add staff.']);
        }
        exit;
    }

    if($action == 'update'){
        $result = $users->updateStaff($id,$fname,$lname,$email,$role,$password);
        if($result){
            echo json_encode(['status'=>'success','message'=>'Staff updated successfully.']);
        } else {
            echo json_encode(['status'=>'error','message'=>'Failed to update staff.']);
        }
        exit;
    }
}

if($action == 'delete'){
    $id = $_POST['id'];
    $result = $users->deleteStaff($id);
    if($result){
        echo json_encode(['status'=>'success','message'=>'Staff deleted successfully.']);
    } else {
        echo json_encode(['status'=>'error','message'=>'Failed to delete staff.']);
    }
    exit;
}