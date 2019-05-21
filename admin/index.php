<?php
require("../login/validasi.php");
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
        <title>DASHBOARD</title>
        <link href="https://fonts.googleapis.com/css?family=Roboto|Pacifico" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
            integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <script src="../assets/js/jquery-3.3.1.js"></script>
    </head>

    <body>
        <div class="header">
            <br>
            <p>let's go</p>
            <a href="../login/logout.php"><button><i class="fas fa-sign-out-alt    "></i> LOGOUT</button></a>
        </div>
        <table class="container">
            <tr>
                <td colspan="2" class="menu">
                    <a href="./index.php">
                        <div><i class="fas fa-columns    "></i> Dashboard</div>
                    </a>
                    <a href="../admin/user/user.php">
                        <div><i class="fas fa-user-alt    "></i> User</div>
                    </a>
                    <a href="../admin/station/stasiun.php">
                        <div><i class="fas fa-subway    "></i> Station</div>
                    </a>
                    <a href="../admin/jadwal/jadwal.php">
                        <div> <i class="fas fa-calendar-alt    "></i> Schedule</div>
                    </a>
                    <a href="../admin/iklan/iklan.php">
                        <div> <i class="fas fa-percent    "></i> Promo</div>
                    </a>
                    <a href="./Cart/cart.php">
                        <div><i class="fas fa-cart-arrow-down    "></i> Cart</div>
                    </a>
                </td>

                <td class="content">
                    <br><br><br>
                    <h3>DASHBOARD</h3>
                    <div class="big-box">
                        <br>
                        <div class="box" style="background-color: #00b0ff;">

                            <center>Admin
                                <br>
                                <i class="fas fa-user    "></i>&nbsp;&nbsp;&nbsp;&nbsp;
                                <?php
                            include("../config/koneksi.php");
                            $sql = "SELECT COUNT(*) FROM user where level='admin';";
                            $query = mysqli_query($db, $sql);
                            $row = mysqli_fetch_array($query);
                            echo $row[0];
                            ?>
                            </center>
                        </div>
                        <div class="box" style="background-color: #1de9b6;">
                            <center>User
                                <br>
                                <i class="fas fa-user    "></i>&nbsp;&nbsp;&nbsp;&nbsp;
                                <?php
                            include("../config/koneksi.php");
                            $sql = "SELECT COUNT(*) FROM user where level='user';";
                            $query = mysqli_query($db, $sql);
                            $row = mysqli_fetch_array($query);
                            echo $row[0];
                            ?>
                            </center>
                        </div>
                        <div class="box" style="background-color: #e8f5e9;">
                            <center>Stasiun
                                <br>
                                <i class="fas fa-train    "></i>&nbsp;&nbsp;&nbsp;&nbsp;
                                <?php
                            include("../config/koneksi.php");
                            $sql = "SELECT COUNT(*) FROM stasiun";
                            $query = mysqli_query($db, $sql);
                            $row = mysqli_fetch_array($query);
                            echo $row[0];
                            ?>
                            </center>
                        </div>
                        <br><br><br>
                        <div class="box" style="background-color: #cddc39">
                            <center>Schedule
                                <br>
                                <i class="fas fa-calendar-alt    "></i>&nbsp;&nbsp;&nbsp;&nbsp;
                                <?php
                            include("../config/koneksi.php");
                            $sql = "SELECT COUNT(*) FROM jadwal";
                            $query = mysqli_query($db, $sql);
                            $row = mysqli_fetch_array($query);
                            echo $row[0];
                            ?>
                            </center>
                        </div>
                        <hr>
                        <div class="progress-bar blue stripes" style="background-color: #4dd0e1;">
                            <?php
                            $sql = "SELECT  count(status) as jumlah FROM headtransaksi where status='Complet'";
                            $query = mysqli_query($db, $sql);
                            $row = mysqli_fetch_array($query);
                            ?>
                            <span style="width: 100%">Status Complet : <?php echo $row['jumlah']; ?></span>
                        </div>
                        <div class="progress-bar blue stripes" style="background-color: #ffd54f;">
                            <?php
                            $sql = "SELECT  count(status) as jumlah FROM headtransaksi where status='Proses'";
                            $query = mysqli_query($db, $sql);
                            $row = mysqli_fetch_array($query);
                            
                            ?>
                            <span style="width: 100%">Status Proses : <?php echo $row['jumlah']; ?></span>
                        </div>
                        <div class="progress-bar blue stripes" style="background-color: #f4511e;">
                            <?php
                            $sql = "SELECT  count(status) as jumlah FROM headtransaksi where status='Pending'";
                            $query = mysqli_query($db, $sql);
                            $row = mysqli_fetch_array($query);
                            ?>
                            <span style="width: 100%">Status Pending : <?php echo $row['jumlah']; ?></span>
                        </div>

                </td>
                </div>
            </tr>
            <div>

            </div>

        </table>
        <div class="footer">
            Copyright &copy; 2019
            Designed by lets_go
        </div>
    </body>

</html>