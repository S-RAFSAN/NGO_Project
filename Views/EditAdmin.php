<?php
session_start();
include('database.php');

$id = $_GET['id'];
$unsuccessfulmsg = '';

$admin = "SELECT * FROM admin WHERE id = ?";
$stmt = $conn->prepare($admin);
$stmt->bind_param('i', $id);
$stmt->execute();
$admin_instance = $stmt->get_result();
$single_admin = $admin_instance->fetch_assoc();

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    if (empty($name) || empty($mobile) || empty($email) || empty($address)) {
        $emptymsg = 'Fill up all fields';
    } else {
        $updateProduct = "UPDATE admin SET name = ?, mobile = ?, email = ?, address = ? WHERE id = ?";
        $stmt = $conn->prepare($updateProduct);
        $stmt->bind_param('ssssi', $name, $mobile, $email, $address, $id);

        if ($stmt->execute()) {
            header('location: AdminList.php');
            $_SESSION['message'] = 'Admin Updated Successfully';
        } else {
            echo 'Data not updated';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <div class="edit-admin">
            <div class="edit-admin-header">
                <h4>Edit Admin</h4>
            </div>
            <form action="" method="POST" class="edit-admin-form">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input value="<?php echo $single_admin["name"]; ?>" type="text" class="form-control" id="name" name="name" />
                </div>
                <div class="form-group">
                    <label for="mobile">Mobile</label>
                    <input value="<?php echo $single_admin["mobile"]; ?>" type="text" class="form-control" id="mobile" name="mobile" />
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input value="<?php echo $single_admin["email"]; ?>" type="text" class="form-control" id="email" name="email" />
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input value="<?php echo $single_admin["address"]; ?>" type="text" class="form-control" id="address" name="address" />
                </div>
                <div class="form-group">
                    <button name="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
