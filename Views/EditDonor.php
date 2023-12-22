<?php
session_start();
include('database.php');

$id = $_GET['id'];
$unsuccessfulmsg = '';

$donor = "SELECT * FROM donor WHERE id = ?";
$stmt = $conn->prepare($donor);
$stmt->bind_param('i', $id);
$stmt->execute();
$donor_instance = $stmt->get_result();
$single_donor = $donor_instance->fetch_assoc();

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    if (empty($name) || empty($mobile) || empty($email) || empty($address)) {
        $emptymsg = 'Fill up all fields';
    } else {
        $updateProduct = "UPDATE donor SET name = ?, mobile = ?, email = ?, address = ? WHERE id = ?";
        $stmt = $conn->prepare($updateProduct);
        $stmt->bind_param('ssssi', $name, $mobile, $email, $address, $id);

        if ($stmt->execute()) {
            header('location: DonorList.php');
            $_SESSION['message'] = 'Donor Updated Successfully';
        } else {
            echo 'Data not updated';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Donor</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles.css">
</head>

<body>

    <div class="container">
        <div class="page-header">
            <h2>Edit Donor</h2>
        </div>
        <form action="" method="POST" class="form-container">
            <div class="form-group">
                <label for="name" class="label">Name</label>
                <input value="<?php echo $single_donor["name"]; ?>" type="text" class="input" id="name" name="name" />
            </div>
            <div class="form-group">
                <label for="mobile" class="label">Mobile</label>
                <input value="<?php echo $single_donor["mobile"]; ?>" type="text" class="input" id="mobile" name="mobile" />
            </div>
            <div class="form-group">
                <label for="email" class="label">Email</label>
                <input value="<?php echo $single_donor["email"]; ?>" type="text" class="input" id="email" name="email" />
            </div>
            <div class="form-group">
                <label for="address" class="label">Address</label>
                <input value="<?php echo $single_donor["address"]; ?>" type="text" class="input" id="address" name="address" />
            </div>
            <div class="form-group">
                <button name="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>

</body>

</html>
