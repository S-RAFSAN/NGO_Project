<?php
session_start();
require_once '../Models/userModel.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_email = $_POST["user_email"];
    $user_password = $_POST["user_password"];

    $userModel = new UserModel($conn);

    if ($userModel->authenticateUser($user_email, $user_password)) {
        $_SESSION['user_email'] = $user_email;
        header("Location: ../Views/HomePage.php");
        exit();
    } else {
        $unsuccessfulmsg = "Invalid email or password";
        $_SESSION['unsuccessfulmsg'] = $unsuccessfulmsg;
        header("Location: ../Views/Login.php");
        exit();
    }
}

?>
