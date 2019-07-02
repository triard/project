<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta charset="UTF-8">
        <title>Cart</title>
        <link rel="stylesheet" type="text/css" href="../assets/css/style-user.css">
        <script src="../assets/js/jquery-3.3.1.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">

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
        <a href="./riwayat-transaksi.php"><button style="margin:10px; font-size:20px; padding:5px;">back</button></a>
        <center><h3>Detail pembelian</h3></center>
        <div class="cart" style="margin-top:50px;">
            <table class="kotak-cart">
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
                            include '../config/koneksi.php';
                            $trans = $_GET['id_trans'];
                            $sql = "SELECT * FROM detailtransaksi where id_trans = $trans";
                            $query = mysqli_query($db, $sql);
                            
                            
                            while($cart = mysqli_fetch_array($query)){
                            if($cart) {
                                echo "<tr style='text-align:center; height:60px;'>";
                                $st1=mysqli_query($db, "SELECT nama_kr from jadwal where id_jd=$cart[1]");
                                $nmst1 = mysqli_fetch_array($st1);
                                echo "<td>" . $nmst1['nama_kr'] . "</td>";
                                echo "<td>" . $cart[2] . "</td>";
                                echo "<td>" . $cart[3] . "</td>";
                                echo "<td>" . $cart[4] . "</td>";
                                echo "</tr>";
                            }else {
                                echo "
                                <tr>
                                    <td>
                                         Your Cart is Empty :( <br>
                                         start looking for train tickets for your trip.
                                        <br><br>
                                    </td>
                                </tr>
                                 ";
                            }
                            }
                            ?>
                </tbody>
                <br>
            </table>
            <table class="kotak-cart">
                <p>Data Penumpang</p>
                <tr class="kotak-judul">
                        <th>Nama Penumpang</th>
                        <th>No. Identitas</th>
                </tr>
                
                <?php
                                $trans = $_GET['id_trans'];
                                $sql = "SELECT * FROM penumpang where id_trans = $trans";
                                $query = mysqli_query($db, $sql);
                                // if($cart>0) {
                                while($cart = mysqli_fetch_array($query)){
                                if($cart){
                                echo "<tr style='text-align:center; height:60px;'>";
                                echo "<td>" . $cart['nama'] . "</td>";
                                echo "<td>" . $cart['no_identitas'] . "</td>";
                                echo "</tr>";
                                }    
                            }
                ?>
            </table>
        </div>
        <footer>
            <nav>
                <ul>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms</a></li>
                </ul>
            </nav>
            <p>&copy; 2019. lets.go. All Rights Reserved.</p>
        </footer>
    </body>

</html>