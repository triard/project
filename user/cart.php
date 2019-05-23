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
                <a class="active" href="#confirm">Confirm</a>
                <a href="./indexKontak.php">Contact</a>
                <a href="./aboutus.php">About</a>
                <a href="../login/index.php">Log out</a>
            </div>
        </div>
        <div id="flex-container-cart">
            <div>
                <form action="./riwayat-transaksi.php" method="post">
                    <input type='hidden' name='idUser' value='<?php echo $_SESSION['id'] ?>'>
                    <button class="btn-abang-cart">
                        <i class="fas fa-history    "></i>
                        <span>Riwayat</span>
                    </button>
                </form>
            </div>
            <div>
                <?php
                   include '../config/koneksi.php';
                            session_start();
                            $idUser = $_SESSION['id'];
                            $sql = "SELECT * FROM cart where id_user = $idUser";
                            $query = mysqli_query($db, $sql);
                            $cart = mysqli_fetch_array($query);


                    echo "<a class='button' href='./controllerCart.php?act=del&&id_jd=$cart[1]&&idUser=$cart[0]'><button onclick=' return confirm('Sure to drop the cart?')'  style='height:40px; width:105px;'><i class='fas fa-trash    '></i>
                        Delete All</button></a>";
                    
                    ?>
            </div>
        </div>
        <div class="cart" style="margin-top:5%;">
            <table class="kotak-cart">
                <tbody>

                    <?php
                            $idUser = $_SESSION['id'];
                            $sql = "SELECT * FROM cart where id_user = $idUser";
                            $query = mysqli_query($db, $sql);
                            $cart = mysqli_fetch_array($query);
                            
                            if($cart) {
                                ?>
                    <tr class="kotak-judul">
                        <th>Nama</th>
                        <th>Nama Kereta</th>
                        <th>quality</th>
                        <th>Aksi</th>
                    </tr>
                    <?php
                                echo "<tr style='text-align:center; height:60px;'>";
                                $st=mysqli_query($db, "SELECT username from user where id=$cart[0]");
                                $nmst = mysqli_fetch_array($st);
                                echo "<td>" . $nmst['username'] . "</td>";
                             
                                $st1=mysqli_query($db, "SELECT nama_kr from jadwal where id_jd=$cart[1]");
                                $nmst1 = mysqli_fetch_array($st1);
                                echo "<td>" . $nmst1['nama_kr'] . "</td>";
                                echo "<td>" . $cart[2] . "</td>";
                                echo "<td>";
                                echo "<a class='button' href='./controllerCart.php?act=del&&id_jd=$cart[1]&&idUser=$cart[0]'><button class='btn-trash-cart'> <i class='fas fa-trash-alt    '></i> Delete</button></a>";
                                echo "</td>";
                                echo "</tr>";
                                ?>
                    <p>total</p>
                    <?php
                                 $idUser = $_SESSION['id'];
                                 $sql1 = "SELECT * FROM cart where id_user = $idUser";
                                 $query1 = mysqli_query($db, $sql1);
                                 $jum1 = mysqli_fetch_array($query1);
          
                                 $sql = "SELECT SUM(harga)*$jum1[2] as subtotal FROM jadwal where id_jd=$jum1[id_jd]";
                                 $query = mysqli_query($db, $sql);
                                 $grandtotal = mysqli_fetch_assoc($query);
          
                                 if($grandtotal>0){
                                 echo "Rp. " . number_format($grandtotal['subtotal'], 0, ',', '.');       
                                 
                                 
                                }else{
                                echo "(:";
                                }
                                ?>
                            <br><a href="./checkout.php?jml=<?php echo $jum1[2]; ?>">
                            <button class="btn-abang-cart">
                            <i class="fas fa-money-bill-alt    "></i>
                            <span>Checkout</span>
                            </button>
                            </a>
                    <?php
                            }else {
                                echo "
                                <tr>
                                    <td> <center>
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
        </div>
    </body>
</html>