<?php
session_start();
include('database.php');

$unsuccessfulmsg = '';

$sql = "SELECT * from donor";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Donors</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles.css">

    <script>
        function myFunction() {
            // Declare variables
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementsByClassName("donors-table")[0];
            tr = table.getElementsByTagName("tr");

            
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];  (0-indexed)
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>

</head>

<body>

    <div class="container">

        <nav class="main-nav">
            <div class="nav-links">
                <a class="nav-link" href="HomePage.php">Home</a>
                <a class="nav-link" href="Logout.php">Logout</a>
            </div>
        </nav>

        <p class="message text-center text-success mt-4">
            <?php if (!empty($_SESSION['message'])) {
                echo $_SESSION['message'];
            } ?>
        </p>

        <div class="donors-content">
            <div class="donors-header">
                <div class="section-title">
                    <h4>Donor List</h4>
                </div>
                <div class="add-donor-link">
                    <a href="AddDonor.php" class="btn btn-primary">Add Donor</a>
                </div>
            </div>

            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
            <br><br>

            <table class="donors-table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Mobile</th>
                        <th scope="col">Email</th>
                        <th scope="col">Address</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<tr>';
                            echo '<td>' . $row['id'] . '</td>';
                            echo '<td>' . $row['name'] . '</td>';
                            echo '<td>' . $row['mobile'] . '</td>';
                            echo '<td>' . $row['email'] . '</td>';
                            echo '<td>' . $row['address'] . '</td>';
                            echo '<td><a href="EditDonor.php?id=' . $row['id'] . '" class="btn btn-secondary">Edit</a> 
                            <a href="DeleteDonor.php?id=' . $row['id'] . '" class="btn btn-danger">Delete</a></td>';
                            echo '</tr>';
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
