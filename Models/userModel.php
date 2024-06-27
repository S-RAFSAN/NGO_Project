<?php
require_once 'dbConnection.php';

class UserModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function authenticateUser($user_email, $user_password) {
        $hashed_password = '';
        $stmt = $this->conn->prepare("SELECT password FROM users WHERE email = ?");
        $stmt->bind_param("s", $user_email);
        $stmt->execute();
        $stmt->bind_result($hashed_password);
        $stmt->fetch();
        $stmt->close();

        $hashed_password = $hashed_password ?? '';

        if ($hashed_password && password_verify($user_password, $hashed_password)) {
            return true; 
        } else {
            return false; 
        }
    }

    public function registerUser($first_name, $last_name, $email, $password, $date_of_birth, $gender, $blood_group) {

        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $this->conn->prepare("INSERT INTO users (first_name, last_name, email, gender, date_of_birth, blood_group, password) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $first_name, $last_name, $email, $gender, $date_of_birth, $blood_group, $hashed_password);

        if ($stmt->execute()) {
            return true; 
        } else {
            return false; 
        }
    }
}
?>
