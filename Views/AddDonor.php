<?php
session_start();
include('database.php');

$unsuccessfulmsg = '';

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    if (empty($name) || empty($mobile) || empty($email) || empty($address)) {
        $emptymsg = 'Fill up all fields';
    } else {
        $stmt = $conn->prepare("INSERT INTO donor (name, mobile, email, address) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $mobile, $email, $address);

        if ($stmt->execute()) {
            header('location: DonorList.php');
            $_SESSION['message'] = 'Donor Saved Successfully';
        } else {
            echo 'Data not inserted';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Donor Add</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles.css">
</head>

<body>

    <div class="container">
        <div class="page-header">
            <h2>Donor Add</h2>
        </div>

        <form action="" method="POST" class="form-container">
            <div class="form-group">
                <label for="name" class="label">Name</label>
                <input type="text" class="input" id="name" name="name" />
            </div>
            <div class="form-group">
                <label for="mobile" class="label">Mobile</label>
                <input type="text" class="input" id="mobile" name="mobile" />
            </div>
            <div class="form-group">
                <label for="email" class="label">Email</label>
                <input type="text" class="input" id="email" name="email" />
            </div>
            <div class="form-group">
                <label for="address" class="label">Address</label>
                <input type="text" class="input" id="address" name="address" />
            </div>
            <div class="form-group">
                <button name="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>

</body>

</html>
