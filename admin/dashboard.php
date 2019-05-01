<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
        <title>Document</title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
            integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    </head>

    <body>
        <div class="header">
            <br>
            <p>let's go</p>
            <a href="../login/logout.php">LOGOUT</a>
        </div>
        <table class="container">
            <tr>
                <td colspan="2" class="menu">
                    <div><a href="../admin/dashboard.php"> <img src="../assets/icon/dashboard.png"> Dashboard</a></div>
                    <div><a href="../admin/user/user.php"> <img src="../assets/icon/user.png"> User</a></div>
                    <div><a href="../admin/station/stasiun.php"> <img src="../assets/icon/stasiun.png"> Stasiun</a>
                    </div>
                    <div><a href="../admin/jadwal/jadwal.php"> <img src="../assets/icon/jadwal.png"> Jadwal</a></div>
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
                            <center>Stasiun
                                <br>
                                <i class="fas fa-journal-whills    "></i>&nbsp;&nbsp;&nbsp;&nbsp;
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
                </td>
                </div>
            </tr>

        </table>
        <div class="footer">
            Copyright &copy; 2019
            Designed by lets_go
        </div>
    </body>

</html>