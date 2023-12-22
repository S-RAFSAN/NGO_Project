<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to the NGO</title>
    <link rel="stylesheet" href="First.css">
</head>
<body>

    <div class="welcome-container">
        
        

        <div class="welcome-video-container">
            <video class="welcome-video" autoplay loop muted>
                <source src="background.mp4" type="video/mp4">                
            </video>
            
            <div class="content">
                <div class="welcome-box">
                    <img class="welcome-image" src="login.png" alt="Donor Image">
                    <a href="Controllers/logController.php" class="welcome-link">LOGIN</a>
                </div>

                <h1>WELCOME !</h1>

                <div class="welcome-box">
                    <img class="welcome-image" src="registration.jpeg" alt="Admin Image">
                    <a href="Controllers/regController.php" class="welcome-link">REGISTRATION</a>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
