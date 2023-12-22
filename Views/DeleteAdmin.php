<?php
session_start();
include('database.php');
$id = $_GET['id'];


$unsuccessfulmsg = '';

if (isset($_POST['confirm'])) {
    
    $deleteAdmin = "DELETE FROM admin WHERE id = ?";
    $stmt = $conn->prepare($deleteAdmin);
    $stmt->bind_param('i', $id);

    if ($stmt->execute()) {
        header('location: AdminList.php');
        $_SESSION['message'] = 'Admin Deleted Successfully';
    } else {
        echo 'Data not deleted';
    }
} else {
    
    $admin = "SELECT name FROM admin WHERE id = ?";
    $stmt = $conn->prepare($admin);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $stmt->bind_result($adminName);
    $stmt->fetch();
    $stmt->close();
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Delete Admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles.css">
    
</head>

<body>
    <div class="">
        <div class="">
            <div class="">
                <h4>Delete Admin</h4>
            </div>
        </div>
        <div class="">
            <p>Are you sure you want to delete the admin "<?php echo $adminName; ?>"?</p>
        </div>
        <form action="" method="POST" class="">
            <button type="submit" name="confirm" class="">Confirm Delete</button>
            <a href="AdminList.php" class="">Cancel</a>
        </form>
    </div>
</body>

</html>
