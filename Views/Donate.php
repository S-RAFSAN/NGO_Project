<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donate</title>
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

        <div class="content">
            <div class="row">
                <div class="col-md-3">
                    <h4>Check Here Who You Can Donate To</h4>
                </div>

                <div class="col-md-3">
                    <form action="" method="GET" class="filter-form">
                        <div class="filter-section">
                            <div class="filter-header">
                                <h4>Filter
                                    <button type="submit" class="filter-btn">Check</button>
                                </h4>
                            </div>
                            <div class="blood-groups">
                                <h4>Blood Groups</h4>
                                <hr>
                                <?php
                                $con = mysqli_connect("localhost", "root", "", "webtech");
                                $blood_query = "SELECT * FROM  first_group";
                                $blood_query_run = mysqli_query($con, $blood_query);

                                if (mysqli_num_rows($blood_query_run) > 0) {
                                    foreach ($blood_query_run as $bloodlist) {
                                        $checked = [];
                                        if (isset($_GET['brands'])) {
                                            $checked = $_GET['brands'];
                                        }
                                        ?>
                                        <div class="blood-group-item">
                                            <input type="checkbox" name="brands[]" value="<?= $bloodlist['id']; ?>" <?php
                                              if (in_array($bloodlist['id'], $checked)) {
                                                  echo "checked";
                                              } ?> />
                                            <?= $bloodlist['name']; ?>
                                        </div>
                                        <?php
                                    }
                                } else {
                                    echo "No Brands Found";
                                }
                                ?>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-md-9 mt-3">
                    <div class="card ">
                        <div class="card-body row">
                            <?php
                            if (isset($_GET['brands'])) {
                                $bloodchecked = [];
                                $bloodchecked = $_GET['brands'];
                                foreach ($bloodchecked as $rowbrand) {
                                    $products = "SELECT * FROM donate WHERE brand_id IN ($rowbrand)";
                                    $products_run = mysqli_query($con, $products);
                                    if (mysqli_num_rows($products_run) > 0) {
                                        foreach ($products_run as $proditems):
                                            ?>
                                            <div class="col-md-4 mt-3">
                                                <div class="item-card border p-2">
                                                    <h1><?= $proditems['name']; ?></h1>
                                                </div>
                                            </div>
                                            <?php
                                        endforeach;
                                    }
                                }
                            } else {
                                $products = "SELECT * FROM donate";
                                $products_run = mysqli_query($con, $products);
                                if (mysqli_num_rows($products_run) > 0) {
                                    foreach ($products_run as $proditems):
                                        ?>
                                        <div class="col-md-4 mt-3">
                                            <div class="item-card border p-2">
                                                <h4><?= $proditems['name']; ?></h4>
                                            </div>
                                        </div>
                                        <?php
                                    endforeach;
                                } else {
                                    echo "No Items Found";
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
