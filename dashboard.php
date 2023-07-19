<?php
session_start();

if (isset($_GET['logout'])) {

    unset($_SESSION['registration']);

    header("location:/index.php");

    exit();
}

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">

<head lang="en">
    <meta charset="UTF-8">
    <title>Dashboard</title>

    <link href="css/style.css" rel="stylesheet">

    <!--- Bootstrap 5.3  --->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <!-- JQuery 3.6.0 -->
    <script rel="preconnect" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>

    <div class="container py-4 border-bottom">
        <div class="row">
            <div class="col-4"><a href="index.php" class="btn btn-primary">LOGO</a></div>
            <div class="col-4">
                <div class="d-flex">
                    <?php

                    if (isset($_SESSION['registration'])) {
                    ?>
                        <div class="gust float_left">Welcome
                            : <?php echo $_SESSION['registration']['first_name'] ?>
                        </div>
                        <div class="float_left" style="margin: 0 10px;color: #000;">|</div>
                        <div class="l_in_top float_left"><a href="index.php?logout=logout">Log Out</a></div>

                    <?php
                    } else {
                    ?>
                        <div class="gust float_left">Welcome :</div>
                        <div class="gust float_left">Guest</div>

                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <div style="margin: 150px 0;text-align: center;">
        <h1>Welcome Dashboard Page</h1>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>

</html>