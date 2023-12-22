<?php
session_start();
include('database.php');
$id = $_GET['id'];

$unsuccessfulmsg = '';

if (isset($_POST['confirm'])) {
    $deleteDonor = "DELETE FROM donor WHERE id = ?";
    $stmt = $conn->prepare($deleteDonor);
    $stmt->bind_param('i', $id);

    if ($stmt->execute()) {
        header('location: DonorList.php');
        $_SESSION['message'] = 'Donor Deleted Successfully';
    } else {
        echo 'Data not deleted';
    }
} else {
  
    $donor = "SELECT name FROM donor WHERE id = ?";
    $stmt = $conn->prepare($donor);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $stmt->bind_result($donorName);
    $stmt->fetch();
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Delete Donor</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles.css">
</head>

<body>

    <div class="container">
        <div class="page-header">
            <h2>Delete Donor</h2>
        </div>
        <div class="confirmation-message">
            <p>Are you sure you want to delete the donor "<?php echo $donorName; ?>"?</p>
        </div>
        <form action="" method="POST" class="form-container">
            <button type="submit" name="confirm" class="btn btn-danger">Confirm Delete</button>
            <a href="DonorList.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>

</body>

</html>
