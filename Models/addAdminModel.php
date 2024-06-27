<?php
require_once 'dbConnection.php';

class addAdminModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function addAdmin($name, $mobile, $email, $address) {
        $stmt = $this->conn->prepare("INSERT INTO admin (name, mobile, email, address) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $mobile, $email, $address);

        if ($stmt->execute()) {
            return true; 
        } else {
            return false; 
        }
    }
}
?>