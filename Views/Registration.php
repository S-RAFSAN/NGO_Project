<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Registration</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="registration-page">
        <div class="reg-title">
            <h3 class=""><u>REGISTRATION SYSTEM</u></h3>
        </div>

        <div class="reg-options">
            <form action="../Controllers/regCheckController.php" method="POST">
            
                <div class="reg-info">
                    <label for="first_name">First Name:</label>
                    <input type="text" name="first_name" placeholder="Your First Name" value="<?php echo isset($_POST['first_name']) ? $_POST['first_name'] : ''; ?>" />
                </div>

                <div class="reg-info">
                    <label for="last_name">Last Name:</label>
                    <input type="text" name="last_name" placeholder="Your Last Name" value="<?php echo isset($_POST['last_name']) ? $_POST['last_name'] : ''; ?>" />
                </div>

                <div class="reg-info">
                    <label for="email">Email:</label>
                    <input type="email" name="email" placeholder="Enter your email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>" />
                </div>

                <div class="reg-info">
                    <label for="password">Password:</label>
                    <input type="password" name="password" placeholder="Enter password" value="<?php echo isset($_POST['password']) ? $_POST['password'] : ''; ?>" />
                </div>

                <div class="reg-info">
                    <label for="gender">Gender:</label>
                    <input type="radio" name="gender" value="female" <?php echo (isset($_POST['gender']) && $_POST['gender'] === 'female') ? 'checked' : ''; ?> /> Female
                    <input type="radio" name="gender" value="male" <?php echo (isset($_POST['gender']) && $_POST['gender'] === 'male') ? 'checked' : ''; ?> /> Male
                    <input type="radio" name="gender" value="other" <?php echo (isset($_POST['gender']) && $_POST['gender'] === 'other') ? 'checked' : ''; ?> /> Other
                </div>

                <div class="reg-info">
                    <label for="date_of_birth">Date:</label>
                    <input type="date" name="date_of_birth" value="<?php echo isset($_POST['date_of_birth']) ? $_POST['date_of_birth'] : ''; ?>" />
                </div>

                <div class="reg-info">
                    <label for="blood_group">Blood Group:</label>
                    <select name="blood_group">
                        <option value="" disabled selected>Select Your Blood Group</option>
                        <option value="A-" <?php echo (isset($_POST['blood_group']) && $_POST['blood_group'] === 'A-') ? 'selected' : ''; ?>>A-</option>
                        <option value="A+" <?php echo (isset($_POST['blood_group']) && $_POST['blood_group'] === 'A+') ? 'selected' : ''; ?>>A+</option>
                        <option value="B-" <?php echo (isset($_POST['blood_group']) && $_POST['blood_group'] === 'B-') ? 'selected' : ''; ?>>B-</option>
                        <option value="B+" <?php echo (isset($_POST['blood_group']) && $_POST['blood_group'] === 'B+') ? 'selected' : ''; ?>>B+</option>
                        <option value="AB-" <?php echo (isset($_POST['blood_group']) && $_POST['blood_group'] === 'AB-') ? 'selected' : ''; ?>>AB-</option>
                        <option value="AB+" <?php echo (isset($_POST['blood_group']) && $_POST['blood_group'] === 'AB+') ? 'selected' : ''; ?>>AB+</option>
                        <option value="O-" <?php echo (isset($_POST['blood_group']) && $_POST['blood_group'] === 'O-') ? 'selected' : ''; ?>>O-</option>
                        <option value="O+" <?php echo (isset($_POST['blood_group']) && $_POST['blood_group'] === 'O+') ? 'selected' : ''; ?>>O+</option>
                    </select>
                </div>

                <div class="reg-sign">
                    <button name="submit">Sign Up</button>
                </div>

                <div class="reg-login">
                    Already have an account? <a href="login.php">Login</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
