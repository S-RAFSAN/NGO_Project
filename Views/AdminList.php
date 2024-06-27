<?php
session_start();
include('database.php');

$unsuccessfulmsg = '';

$sql = "SELECT * from admin";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admins</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles.css">

    <script>
        function myFunction() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementsByClassName("table")[0];
            tr = table.getElementsByTagName("tr");

            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1]; // (0-indexed)
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

        setTimeout(function () {
            var messageElement = document.querySelector('.message');
            if (messageElement) {
                messageElement.style.display = 'none';
            }
        }, 3000);

    </script>


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

        <p class="message">
            <?php if (!empty($_SESSION['message'])) {
                echo $_SESSION['message'];
            } ?>
        </p>

        <div class="admin-list">
            <div class="donors-header">
                <div class="section-title">
                    <h4>Admin List</h4>
                </div>
                <div class="add-donor-link">
                    <a href="AddAdmin.php" class="btn btn-primary">Add Admin</a>
                </div>
            </div>
            <br>
            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.."
                title="Type in a name">
            <br><br>


            <table class="table">
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
                            echo '<td><a href="EditAdmin.php?id=' . $row['id'] . '" class="btn btn-info">Edit</a> 
 <a href="DeleteAdmin.php?id=' . $row['id'] . '" class="btn btn-danger">Delete</a></td>';
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