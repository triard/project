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
                    <a href="#cart">
                        <div><i class="fas fa-cart-arrow-down    "></i> Cart</div>
                    </a>
                </td>
                <td class="content">
                    <br><br>
                    <h3><i class="fas fa-cart-arrow-down    "></i> Cart</h3>
                    <div>
                        <table class="kotak" style="width:80%; margin:100px;">
                            <thead>
                                <tr class="kotak-judul" style="height:60px;">
                                    <th>Id<br>Transaksi</th>
                                    <th>Tanggal</th>
                                    <th>User</th>
                                    <th>Grandtotal</th>
                                     <th>Status</th>
                                    <th>Bukti<br>Pembayaran</th>
                                    <th>Confirm</th>
                                    <th>View</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                            include '../../config/koneksi.php';
                            $sql = "SELECT * FROM headtransaksi";
                            $query = mysqli_query($db, $sql);


                            while ($cart = mysqli_fetch_array($query)) {
                                echo "<tr class='kotak-form' style='text-align:center; height:60px;'>";
                                echo "<td>" . $cart[0] . "</td>";
                                echo "<td>" . $cart[1] . "</td>";
                                $st=mysqli_query($db, "SELECT username from user where id=$cart[2]");
                                $nmst = mysqli_fetch_array($st);
                                echo "<td>" . $nmst['username'] . "</td>";
                                echo "<td>" . $cart[3] . "</td>";
                                 echo "<td>" . $cart[5] . "</td>";
                                echo "<td> <img style='height:50px; weight:50pxx;' src='../../user/bukti-transfer/".$cart[4]."'></td>";
                                if($cart[5]=='Proses'){
                               echo "<td>";
                                echo "<a class='button' href='./confirm.php?id_trans=$cart[0]'><button class='btn-trash-cart'> <i class='fas fa-check-square    '></i> Confirm</button></a>";
                                echo "</td>";
                                }else{
                                    echo "<td> not yet ): </td>";
                                }
                                echo "<td>";
                                echo "<a class='button' href='./detail.php?id_trans=$cart[0]'><button class='btn-trash-cart'> <i class='fas fa-street-view    '></i> Views</button></a>";
                                echo "</td>";
                                echo "</tr>";
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