<?php
session_start();
include('database.php');

if (isset($_POST['submit'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $date_of_birth = $_POST['date_of_birth'];
    $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
    $blood_group = isset($_POST['blood_group']) ? $_POST['blood_group'] : '';

    if (
        empty($first_name) || empty($last_name) || empty($email) || empty($password) ||
        empty($gender) || empty($date_of_birth) || empty($blood_group)
    ) {
        $emptymsg = 'Please Fill Up';

    } else {
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, email, gender, date_of_birth, blood_group, password) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $first_name, $last_name, $email, $gender, $date_of_birth, $blood_group, $hashed_password);

        if ($stmt->execute()) {
            header('location: Login.php');
            $_SESSION['signupmsg'] = 'Sign Up Complete. Please Log in now.';
        } else {
            echo 'Data not inserted. Error: ' . $stmt->error;
        }
    }
}

$conn->close();
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
            <form action="" method="POST">
                <div class="reg-info">
                    <label for="first_name">First Name:</label>
                    <input type="text" name="first_name" class="" placeholder="Your First Name"
                        value="<?php echo isset($_POST['first_name']) ? $_POST['first_name'] : ''; ?>" />
                    <span class="">
                        <?php echo isset($emptymsg) ? $emptymsg : ''; ?>
                    </span>
                </div>
                <div class="reg-info">
                    <label for="last_name">Last Name:</label>
                    <input type="text" name="last_name" class="" placeholder="Your Last Name"
                        value="<?php echo isset($_POST['last_name']) ? $_POST['last_name'] : ''; ?>" />
                    <span class="">
                        <?php echo isset($emptymsg) ? $emptymsg : ''; ?>
                    </span>
                </div>
                <div class="reg-info">
                    <label for="email">Email:</label>
                    <input type="email" name="email" class="" placeholder="Enter your email"
                        value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>" />
                    <span class="">
                        <?php echo isset($emptymsg) ? $emptymsg : ''; ?>
                    </span>
                </div>
                <div class="reg-info">
                    <label for="password">Password:</label>
                    <input type="password" name="password" class="" placeholder="Enter password"
                        value="<?php echo isset($_POST['password']) ? $_POST['password'] : ''; ?>" />
                    <span class="">
                        <?php echo isset($emptymsg) ? $emptymsg : ''; ?>
                    </span>
                </div>
                <div class="reg-info">
                    <label for="gender">Gender:</label>
                    <br>
                    <input type="radio" name="gender" value="female" <?php echo (isset($_POST['gender']) && $_POST['gender'] === 'female') ? 'checked' : ''; ?> /> Female
                    <br>
                    <input type="radio" name="gender" value="male" <?php echo (isset($_POST['gender']) && $_POST['gender'] === 'male') ? 'checked' : ''; ?> /> Male
                    <br>
                    <input type="radio" name="gender" value="other" <?php echo (isset($_POST['gender']) && $_POST['gender'] === 'other') ? 'checked' : ''; ?> /> Other
                    <br>
                    <span class="text-danger">
                        <?php echo isset($emptymsg) ? $emptymsg : ''; ?>
                    </span>
                </div>
                <div class="reg-info">
                    <label for="date_of_birth">Date:</label>
                    <input type="date" name="date_of_birth" class=""
                        value="<?php echo isset($_POST['date_of_birth']) ? $_POST['date_of_birth'] : ''; ?>" />
                    <span class="">
                        <?php echo isset($emptymsg) ? $emptymsg : ''; ?>
                    </span>
                </div>
                <div class="reg-info">
                    <label for="blood_group">Blood Group:</label>
                    <select name="blood_group" class="">
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
                    <span class="">
                        <?php echo isset($emptymsg) ? $emptymsg : ''; ?>
                    </span>
                </div>
                <div class="reg-sign">
                    <button name="submit" class="">Sign Up</button>
                </div>
                <div class="reg-login">
                    Already have an account? <a href="login.php" class="">Login</a>
                </div>
            </form>
        </div>

    </div>
</body>

</html>