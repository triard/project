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
                    <a href="./cart.php">
                        <div><i class="fas fa-cart-arrow-down    "></i> Cart</div>
                    </a>
                </td>
                <td class="content">
                    <br><br>
                    <div>
                        <table class="kotak" style="width:80%; margin:100px;">
                            <thead>
                                <tr class="kotak-judul">
                                    <th>Nama<br>Kereta</th>
                                    <th>Harga<br>per Tiket</th>
                                    <th>Jumlah<br>Tiket</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                            include '../../config/koneksi.php';
                            $trans = $_GET['id_trans'];
                            $sql = "SELECT * FROM detailtransaksi where id_trans = $trans";
                            $query = mysqli_query($db, $sql);


                            while ($cart = mysqli_fetch_array($query)) {
                                echo "<tr class='kotak-form' style='text-align:center; height:60px;'>";
                               $st1=mysqli_query($db, "SELECT nama_kr from jadwal where id_jd=$cart[1]");
                                $nmst1 = mysqli_fetch_array($st1);
                                echo "<td>" . $nmst1['nama_kr'] . "</td>";
                                echo "<td>" . $cart[2] . "</td>";
                                echo "<td>" . $cart[3] . "</td>";
                                echo "<td>" . $cart[4] . "</td>";
                                echo "</tr>";
                            }
                            ?>
                            </tbody>
                        
                        </table>
                        <table class="kotak" style="width:80%; margin:100px; margin-top:-10px;">
                            <h3 style="margin-left:150px;">Data kereta</h3>
                            <tr class="kotak-judul" style="height:40px;">
                                <th>asal</th>
                                <th>tujuan</th>
                                <th>tanggal berangkat</th>
                                <th>tanggal tiba</th>
                                <th>kelas</th>
                            </tr>

                            <?php
                                $id_trans = $_GET['id_trans'];
                                $kuery = mysqli_query($db, "SELECT * FROM detailtransaksi where id_trans = $id_trans");
                                $ambil=mysqli_fetch_array($kuery);
                                $jadwal = $ambil[1];
                                $s = "SELECT * FROM jadwal where id_jd = $jadwal";
                                $q = mysqli_query($db, $s);
                                while($cart = mysqli_fetch_array($q)){
                                if($cart){

                                 echo "<tr class='kotak-form' style='text-align:center; height:60px;'>";
                                
                                $query ="SELECT stasiun from stasiun where id_st=$cart[2]";
                                $result=mysqli_query($db,$query); 
                                $rows=mysqli_fetch_array($result);
                                ?>
                                <td><?php echo $rows["stasiun"]; ?></td>
                                <?php
                                $query ="SELECT stasiun from stasiun where id_st=$cart[3]";
                                $result=mysqli_query($db,$query); 
                                $rows=mysqli_fetch_array($result);
                                
                                ?>
                                <td><?php echo $rows["stasiun"]; ?></td>
                                <?php
                               
                                echo "<td>" . $cart['tgl_berangkat'] . "</td>";
                                echo "<td>" . $cart['tgl_tiba'] . "</td>";
                                echo "<td>" . $cart['kelas'] . "</td>";
                                echo "</tr>";
                                }    
                            }
                         ?>
                        </table>
                            
                        </table>
                        <table class="kotak" style="width:80%; margin:250px; margin-top:-10px;">
                            <h3 style="margin-left:280px;">Data Penumpang</h3>
                            <tr class="kotak-judul" style="height:40px;">
                                <th>Nama Penumpang</th>
                                <th>No. Identitas</th>
                            </tr>

                            <?php
                                $trans = $_GET['id_trans'];
                                $sql = "SELECT * FROM penumpang where id_trans = $trans";
                                $query = mysqli_query($db, $sql);
                                while($cart = mysqli_fetch_array($query)){
                                if($cart){
                                 echo "<tr class='kotak-form' style='text-align:center; height:60px;'>";
                                echo "<td>" . $cart['nama'] . "</td>";
                                echo "<td>" . $cart['no_identitas'] . "</td>";
                                echo "</tr>";
                                }    
                            }
                ?>
                        </table>
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