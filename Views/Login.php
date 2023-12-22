

<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles.css">

</head>

<body>
    <div class="log-page">
        <div class="log-head">
            <h3 class="log-title"><u>LOGIN SYSTEM</u></h3>
            <p class="log-message">
                <?php if (!empty($_SESSION['signupmsg'])) {
                    echo
                        $_SESSION['signupmsg'];
                } elseif (isset($_GET['logout'])) {
                    echo "Logout successful.";
                } ?>
            </p>
        </div>

        <div class="log-box">
            <p class="log-error">
                <?php echo
                    $unsuccessfulmsg ?>
            </p>
            <form action="../Controllers/logCheckController.php" method="POST">
                <div class="log-email">
                    <label for="email">Email:</label>
                    <input type="email" name="user_email" class="" placeholder="Enter your email" value="<?php
                    if (isset($_POST['submit'])) {
                        echo $user_email;
                    } ?>">
                    <span class="">
                        <?php
                        if (isset($_POST['submit'])) {
                            echo $emailmsg;
                        } ?>
                    </span>
                </div>
                <div class="log-password">
                    <label for="password">Password:</label>
                    <input type="password" name="user_password" class="" placeholder="Enter your password">
                    <span class="">
                        <?php
                        if (isset($_POST['submit'])) {
                            echo $passmsg;
                        } ?>
                    </span>
                </div>

                <div class="btn-log">
                    <button name="submit" class="btn btn-success">Login</button>
                </div>
                <div class="btn-signup">
                    Not an account? <a href="Registration.php" class="">Sign Up</a>
                </div>
        </div>

    </div>
</body>

</html>