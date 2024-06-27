<?php
session_start();
require_once '../Models/addAdminModel.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    $adminModel = new addAdminModel($conn);

    if ($adminModel->addAdmin($name, $mobile, $email, $address)) {
        $_SESSION['user_email'] = $user_email;
        header('location: ../Views/AdminList.php');
        $_SESSION['message'] = 'Admin Saved Successfully';
        exit();
    } else {
        echo 'Data not inserted';
        exit();
    }
}

?>
