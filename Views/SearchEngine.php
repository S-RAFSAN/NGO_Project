<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles.css">
    <title>Search</title>
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

        <div class="search-form">
            <form action="" method="GET">
                <div class="form-group">
                    <input type="text" name="search" required value="<?php if (isset($_GET['search'])) {
                        echo $_GET['search'];
                    } ?>" class="search-input" placeholder="Search data">
                    <button type="submit" class="search-button">Search</button>
                </div>
            </form>
        </div>

        <div class="search-results">
            <div class="table-container">
                <table class="result-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Mobile</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $conn = mysqli_connect("localhost", "root", "", "webtech");

                        if (isset($_GET['search'])) {
                            $filtervalues = $_GET['search'];
                            $query = "SELECT * FROM admin WHERE name LIKE '%$filtervalues%' ";
                            $query_run = mysqli_query($conn, $query);

                            if (mysqli_num_rows($query_run) > 0) {
                                foreach ($query_run as $items) {
                                    ?>
                                    <tr>
                                        <td><?= $items['id']; ?></td>
                                        <td><?= $items['name']; ?></td>
                                        <td><?= $items['mobile']; ?></td>
                                        <td><?= $items['email']; ?></td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="4">No Record Found</td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

</body>

</html>
