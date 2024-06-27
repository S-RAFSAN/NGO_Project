<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMI Calculator</title>
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

        <div class="calculator">
            <h2>BMI Calculator</h2>
            <h4>If BMI &equals; 18.5 - 24.9 {&#128522;} </h4>
            <h4>If BMI &#8800; 18.5 - 24.9 {&#x1F614;} </h4>
            <label for="height">Height (m):</label>
            <input type="number" id="height" placeholder="Enter Height" step="0.01" required>

            <label for="weight">Weight (kg):</label>
            <input type="number" id="weight" placeholder="Enter Weight" step="0.01" required>

            <button onclick="calculateBMI()">Calculate BMI</button>

            <div class="result" id="result"></div>

            <script>
                function calculateBMI() {
                    const height = parseFloat(document.getElementById('height').value);
                    const weight = parseFloat(document.getElementById('weight').value);

                    if (!isNaN(height) && !isNaN(weight) && height > 0 && weight > 0) {
                        const bmi = (weight / Math.pow(height, 2)).toFixed(2);
                        const resultElement = document.getElementById('result');
                        resultElement.innerHTML = `Your BMI: ${bmi}`;
                    } else {
                        alert('Please enter valid height and weight values.');
                    }
                }
            </script>
        </div>

    </div>

</body>

</html>