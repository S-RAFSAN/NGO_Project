<?php
session_start();
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
        <div class="page-header">
            <h2>Add Admin</h2>
        </div>

        <div class="contains">
            
            <form action="../Controllers/addAdminController.php" method="POST" class="add-admin-form">
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
</body>

</html>