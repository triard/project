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
        <br>
        <a href="./cart.php"><button style="margin:10px; font-size:20px; padding:5px;">back</button></a>
        <center>
            <h3>Riwayat Pembelian Tiket Kereta Api</h3>
        </center>
        <div class="cart" style="margin-top:50px;">
            <table class="kotak-cart">
                <tbody>

                    <?php
                            include '../config/koneksi.php';
                            session_start();
                            $idUser = $_SESSION['id'];
                            $sql = "SELECT * FROM headtransaksi where id_user = $idUser";
                            
                            
                            
                            if($query = mysqli_query($db, $sql)) {
                                ?>
                    <tr class="kotak-judul">
                        <th>Id<br>Transaksi</th>
                        <th>Tanggal</th>
                        <th>Grandtotal</th>
                        <th>Status</th>
                        <th>Bukti<br>Pembayaran</th>
                        <th>View</th>
                    </tr>
                    <?php
                                while($cart = mysqli_fetch_array($query)){
                                echo "<tr style='text-align:center; height:60px;'>";
                                echo "<td>" . $cart[0] . "</td>";
                                echo "<td>" . $cart[1] . "</td>";
                                echo "<td>" . $cart[3] . "</td>";
                                echo "<td>" . $cart[5] . "</td>";
                                // $proses "Proses";
                                // $complet "Complet";
                                if($cart[5]=="Proses"||$cart[5]=="Complet"){
                                echo "<td> <img style='height:50px; weight:50pxx;' src='./bukti-transfer/".$cart[4]."'></td>";
                                }else{
                                ?>
                                <td><form enctype="multipart/form-data" action="./upload-bukti.php" method="post">
                                <input type="hidden" name="idTrans" value="<?php echo $cart[0]?>">
                                <input type="file" name="uploadedfile">
                                <br><input class="btn-submit" value="++add" type="submit" name="add">
                                </form>
                                </td>
                                <?php
                                }
                                echo "<td>";
                                if($cart[5]=="Complet"){
                                echo "<a class='button' href='./detail-penumpang.php?id_trans=$cart[0]'><button class='btn-trash-cart'> <i class='fas fa-street-view    '></i> Views</button></a>";
                                }else{
                                    echo "Not yet";
                                }
                                echo "</td>";
                                echo "</tr>";
                                
                            }
                        }else {
                                echo "
                                <tr>
                                    <td>
                                    <center>
                                         Your Cart is Empty :( <br>
                                         start looking for train tickets for your trip.
                                        <br><br>
                                        </center>
                                    </td>
                                </tr>
                                 ";
                            }
                        
                            ?>
                </tbody>
                <br>
            </table>
    </body>

</html>