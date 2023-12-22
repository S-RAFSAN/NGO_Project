<?php
session_start();
include('../Views/database.php');


$unsuccessfulmsg = '';

if (isset($_POST['submit'])) {
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];

    if (empty($user_email)) {
        $emailmsg = 'Enter an email.';
    } else {
        $emailmsg = '';
    }
    if (empty($user_password)) {
        $passmsg = 'Enter your password.';
    } else {
        $passmsg = '';
    }

    if (!empty($user_email) && !empty($user_password)) {
        $stmt = $conn->prepare("SELECT first_name, last_name, password FROM users WHERE email = ?");
        $stmt->bind_param("s", $user_email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($users_first_name, $users_last_name, $hashed_password);
            $stmt->fetch();

            if (password_verify($user_password, $hashed_password)) {
                $_SESSION['last_name'] = $users_last_name;
                $_SESSION['first_name'] = $users_first_name;
                header('location: HomePage.php');
            } else {
                $unsuccessfulmsg = 'Wrong email or password!';
            }
        } else {
            $unsuccessfulmsg = 'Not Found';
        }
    }
}
?>