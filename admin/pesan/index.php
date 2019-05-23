<?php
include '../../config/koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" type="text/css" href="../../assets/css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Pacifico|Francois+One" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
            integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <title>Cart</title>
    </head>

    <body>
        <div class="header">
            <br>
            <p>let's go</p>
            <a href="../../login/logout.php"><button>LOGOUT</button></a>
            
        </div>
        <table class="container">
            <tr>
                <td colspan="2" class="menu">
                    <div style="color:white; text-align:center;">
                    <i class="fas fa-users-cog    "></i> <br>
                    <?php
                    session_start();
                    echo $_SESSION['username'].
                    "<br> Sebagai Admin";
                    ?>
                    <hr>
                    </div>
                    <a href="../index.php">
                        <div><i class="fas fa-columns    "></i> Dashboard</div>
                    </a>
                    <a href="../user/user.php">
                        <div><i class="fas fa-user-alt    "></i> User</div>
                    </a>
                    <a href="../station/stasiun.php">
                        <div><i class="fas fa-subway    "></i> Station</div>
                    </a>
                    <a href="../jadwal/jadwal.php">
                        <div> <i class="fas fa-calendar-alt    "></i> Schedule</div>
                    </a>
                    <a href="../iklan/iklan.php">
                        <div> <i class="fas fa-percent    "></i> Promo</div>
                    </a>
                    <a href="../Cart/cart.php">
                        <div><i class="fas fa-cart-arrow-down    "></i> Cart</div>
                    </a>
                    <hr>
                    <a href="#pesan">
                    <div style="font-size:15px; padding:10px;">
                    <h3><i style="color:yellow; font-size:30px;" class="fas fa-bell    "></i> Incoming<br>&nbsp;&nbsp;&nbsp;&nbsp;Messages<br></h3>
                    <?php
                    $sqli = "SELECT  count(status) as jumlah FROM contactus where status='Unread'";
                    $queryi = mysqli_query($db, $sqli);
                    $rowi = mysqli_fetch_array($queryi);
                    ?>
                    Unread : <?php echo $rowi['jumlah']; ?></span>
                    <?php
                    $s = "SELECT  count(status) as jumlah FROM contactus where status='Read'";
                    $q = mysqli_query($db, $s);
                    $rows = mysqli_fetch_array($q);
                    ?>
                    <br>Read&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $rows['jumlah']; ?></span>

                    </div>
                    </a>
                </td>
                <td class="content">
                    <br><br>
                    <h3><i class="fas fa-bell    "></i> Incoming Messages</h3>
                    <div>
                        <table class="kotak" style="width:80%; margin:100px; margin-top:-30px;">
                            
                            <tbody>
                                <?php
                            
                            $sql = "SELECT * FROM contactus";
                            // echo $sql; die;
                            $query = mysqli_query($db, $sql);
                            if($query){
                                ?>
                                    <tr class="kotak-judul" style="height:60px;">
                                     <th>Id</th>
                                    <th>nama</th>
                                    <th>No. Telp</th>
                                    <th>EMail</th>
                                    <th>Pesan</th>
                                    <th>Status</th>
                                   
                                </tr>
                            <?php
                            while ($cart = mysqli_fetch_array($query)) {
                                echo "<tr class='kotak-form' style='text-align:center; height:60px;'>";
                                echo "<td>" . $cart[0] . "</td>";
                                $st=mysqli_query($db, "SELECT username from user where id=$cart[1]");
                                $nmst = mysqli_fetch_array($st);
                                echo "<td>" . $nmst['username'] . "</td>";
                                echo "<td>" . $cart[2] . "</td>";
                                echo "<td>" . $cart[3] . "</td>";
                                echo "<td>" . $cart[4] . "</td>";
                                echo "<td>" . $cart[5] . "</td>";
                                 if($cart[5]=="Unread"){
                                    ?>
                                    <td>
                                    <a href="./confrim-message.php?idUser=<?php echo $cart[1] ?>&&id=<?php echo $cart[0] ?>"><button style="color:white; background-color:green; padding:10px;">Konfirmasi</button></a>
                                </td>    
                                <?php
                                }
                                
                                echo "</tr>";
                            }
                            }else{
                                echo "<i class='fas fa-bell-slash    '></i> <br>no incoming messenger";
                            }
                            ?>
                            
                            </tbody>
                            <br>
                        </table>
                    </div>
                    
                    <br><br><br><br><br><br><br><br><br><br><br><br>
                </td>
            </tr>

        </table>
        <div class="footer">
            Copyright &copy; 2019
            Designed by lets_go
        </div>
    </body>

</html>