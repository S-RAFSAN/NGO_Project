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
        $stmt = $conn->prepare("INSERT INTO admin ( name, mobile, email, address) VALUES ( ?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $mobile, $email, $address);

        if ($stmt->execute()) {
            header('location: AdminList.php');
            $_SESSION['message'] = 'Admin Saved Successfully';
        } else {
            echo 'Data not inserted';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add Admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <div class="add-admin">
            <div class="add-admin-header">
                <h4>Add Admin</h4>
            </div>
            <form action="" method="POST" class="add-admin-form">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" />
                </div>
                <div class="form-group">
                    <label for="mobile">Mobile</label>
                    <input type="text" class="form-control" id="mobile" name="mobile" />
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email" />
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" name="address" />
                </div>
                <div class="form-group">
                    <button name="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
