<?php
session_start();
require_once '../Models/addDonorModel.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    $donorModel = new DonorModel($conn);

    if ($donorModel->addDonor($name, $mobile, $email, $address)) {
        $_SESSION['user_email'] = $user_email;
        header('location: ../Views/DonorList.php');
        $_SESSION['message'] = 'Donor Saved Successfully';
        exit();
    } else {
        echo 'Data not inserted';
        exit();
    }
}

?>
