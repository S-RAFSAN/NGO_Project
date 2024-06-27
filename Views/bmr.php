<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMR Calculator</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
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
            <h2>BMR Calculator</h2>
            <h4>If Male & Female BMR &equals; 1700 & 1400 {&#128522;} </h4>
            <h4>If Male & Female BMR &#8800; 1700 & 1400 {&#x1F614;} </h4>
            <label for="age">Age (years):</label>
            <input type="number" id="age" placeholder="Enter age" required>

            <label>Gender:</label>
            <div class="radio-group">
                <label for="male">
                    <input type="radio" id="male" name="gender" value="male">
                    Male
                </label>

                <label for="female">
                    <input type="radio" id="female" name="gender" value="female">
                    Female
                </label>
            </div>

            <label for="weight">Weight (kg):</label>
            <input type="number" id="weight" placeholder="Enter weight" step="0.01" required>

            <label for="height">Height (cm):</label>
            <input type="number" id="height" placeholder="Enter height" step="0.01" required>

            <button onclick="calculateBMR()">Calculate BMR</button>

            <div class="result" id="result"></div>

            <script>
                function calculateBMR() {
                    const age = parseFloat(document.getElementById('age').value);
                    const gender = document.querySelector('input[name="gender"]:checked').value;
                    const weight = parseFloat(document.getElementById('weight').value);
                    const height = parseFloat(document.getElementById('height').value);

                    if (!isNaN(age) && !isNaN(weight) && !isNaN(height) && age > 0 && weight > 0 && height > 0) {
                        let bmr;

                        if (gender === 'male') {
                            bmr = 88.362 + 13.397 * weight + 4.799 * height - 5.677 * age;
                        } else {
                            bmr = 447.593 + 9.247 * weight + 3.098 * height - 4.330 * age;
                        }

                        const resultElement = document.getElementById('result');
                        resultElement.innerHTML = `Your BMR: ${bmr.toFixed(2)} calories/day`;
                    } else {
                        alert('Please enter valid age, weight, and height values.');
                    }
                }
            </script>
        </div>

    </div>

</body>

</html>