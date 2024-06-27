<?php
require_once 'dbConnection.php';

class addDonorModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function addDonor($name, $mobile, $email, $address) {
        $stmt = $this->conn->prepare("INSERT INTO donor (name, mobile, email, address) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $mobile, $email, $address);

        if ($stmt->execute()) {
            return true; 
        } else {
            return false; 
        }
    }
}
?>
