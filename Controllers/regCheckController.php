<?php
session_start();
require_once '../Models/userModel.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userModel = new UserModel($conn); 

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $date_of_birth = $_POST['date_of_birth'];
    $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
    $blood_group = isset($_POST['blood_group']) ? $_POST['blood_group'] : '';

    if (empty($first_name) || empty($last_name) || empty($email) || empty($password) || empty($gender) || empty($date_of_birth) || empty($blood_group)) {
        $emptymsg = 'Please Fill Up';
    } else {
        if ($userModel->registerUser($first_name, $last_name, $email, $password, $date_of_birth, $gender, $blood_group)) {
            $_SESSION['signupmsg'] = 'Sign Up Complete. Please Log in now.';
            header('location: ../Views/Login.php');
            exit();
        } else {
            echo 'Data not inserted. Error: ' . $stmt->error;
        }
    }
}
?>
