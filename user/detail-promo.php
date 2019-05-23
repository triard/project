<?php

include("../config/koneksi.php");
$id = $_GET['id'];

// buat query untuk ambil data dari database
$sql = "SELECT * FROM iklan WHERE id=$id";
$query = mysqli_query($db, $sql);
$iklan = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Detail Promo</title>
        <link rel="stylesheet" type="text/css" href="../assets/css/style-user.css">
        <script src="../assets/js/jquery-3.3.1.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
            integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <script src="../assets/js/jquery-3.3.1.js"></script>
    </head>

    <body>

        <div class="header">
            <a href="#default" class="logo">let's go!</a>
            <div class="header-right">
                <a href="./index.php">Home</a>
                <a href="./trains.php">Trains</a>
                <a href="./cart.php">Confirm</a>
                <a href="./indexKontak.php">Contact</a>
                <a href="./aboutus.php">About</a>
                <a href="../login/index.php">Log out</a>
            </div>
        </div>
        <div class="box-promo" style="color:white;">
        <div>
        <h1>Promo</h1>
        <p><?php echo $iklan[1] ?></p>
        </div>
        <div>
            <hr>
        <img src="../admin/iklan/img/<?php echo $iklan[3] ?>">
        <hr>     
        </div>
        <div>
             <?php echo $iklan[2] ?>
        </div>
        </div>
        <footer>
            <nav>
                <ul>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms</a></li>
                </ul>
            </nav>
            <p>&copy; 2019. lets.go. All Rights Reserved.</p>
        </footer>
    </body>

</html>