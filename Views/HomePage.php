<!DOCTYPE html>
<html>

<head>
    <title>Welcome!</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles.css">
</head>

<body>

    <div class="container">

        <nav class="main-nav">
            <div class="nav-links">
                <a class="nav-link" href="HomePage.php">Home</a>
                <a class="nav-link" href="Profile.php">Profile</a>
                <a class="nav-link" href="Logout.php">Logout</a>
            </div>
        </nav>

        <div class="section">
            <div class="card">
                <img class="card-image" src="../Assets/DonorPic.png" alt="Donor Image">
                <h5 class="card-title">Donor Information</h5>
                <p class="card-description">
                    In this section, you can Add, Customize & Remove Donor Details.
                </p>
                <a href="DonorList.php" class="card-link">Donors</a>
            </div>

            <div class="card">
                <img class="card-image" src="../Assets/AdminPic.png" alt="Admin Image">
                <h5 class="card-title">Admin Information</h5>
                <p class="card-description">
                    In this section, you can Add, Customize & Remove Admin Details.
                </p>
                <a href="AdminList.php" class="card-link">Admins</a>
            </div>
        </div>

        <div class="section">
            <div class="card">
                <img class="card-image" src="../Assets/SearchPic.png" alt="Search Image">
                <h5 class="card-title">Search Here</h5>
                <p class="card-description">
                    Looking for someone? Here, you can search for any Admin or Donor information.
                </p>
                <a href="SearchEngine.php" class="card-link">Search</a>
            </div>
        </div>

        <div class="section">
            <div class="card">
                <img class="card-image" src="../Assets/blood-donate.png" alt="Donate Image">
                <h5 class="card-title">Possible Donor</h5>
                <p class="card-description">
                    Check here who you can donate to.
                </p>
                <a href="Donate.php" class="card-link">Explore</a>
            </div>

            <div class="card">
                <img class="card-image" src="../Assets/blood-receive.png" alt="Receive Image">
                <h5 class="card-title">Possible Receiver</h5>
                <p class="card-description">
                    Check from whom you can receive.
                </p>
                <a href="Receive.php" class="card-link">Explore</a>
            </div>
        </div>
        
        <div class="section-cal">
            <div class="card-cal">
                <img class="card-image-cal" src="../Assets/bmi.jpeg" alt="Donate Image">
                <h5 class="card-title">BMI Calculator</h5>
                <p class="card-description">
                    Know your BMI
                </p>
                <a href="bmi.php" class="card-link">Calculate</a>
            </div>

            <div class="card-cal">
                <img class="card-image-cal" src="../Assets/bmr.png" alt="Receive Image">
                <h5 class="card-title">BMR Calculator</h5>
                <p class="card-description">
                    Know your BMR
                </p>
                <a href="bmr.php" class="card-link">Calculate</a>
            </div>
        </div>

    </div>

</body>

</html>
