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
        <center>
            <h3>Riwayat Pembelian Tiket Kereta Api</h3>
        </center>
        <div class="cart" style="margin-top:50px;">
            <table class="kotak-cart">
                <thead>
                    <tr class="kotak-judul">
                        <th>Id<br>Transaksi</th>
                        <th>Tanggal</th>
                        <th>Grandtotal</th>
                        <th>Status</th>
                        <th>Bukti<br>Pembayaran</th>
                        <th>View</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                            include '../config/koneksi.php';
                            session_start();
                            $idUser = $_SESSION['id'];
                            $sql = "SELECT * FROM headtransaksi where id_user = $idUser";
                            $query = mysqli_query($db, $sql);
                            $cart = mysqli_fetch_array($query);
                            
                            if($cart) {
                                echo "<tr style='text-align:center; height:60px;'>";
                                echo "<td>" . $cart[0] . "</td>";
                                echo "<td>" . $cart[1] . "</td>";
                                echo "<td>" . $cart[3] . "</td>";
                                echo "<td>" . $cart[5] . "</td>";
                                echo "<td> <img style='height:50px; weight:50pxx;' src='./bukti-transfer/".$cart[4]."'></td>";
                                
                                echo "<td>";
                                echo "<a class='button' href='./detail-penumpang.php?id_trans=$cart[0]'><button class='btn-trash-cart'> <i class='fas fa-street-view    '></i> Views</button></a>";
                                echo "</td>";
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
                            ?>
                </tbody>
                <br>
            </table>
             <form enctype="multipart/form-data" action="./upload-bukti.php" method="post">
                <?php  $idUser = $_SESSION['id'];?>
                <input type="hidden" name="id" value="<?php echo $idUser ?>">
                <input type="file" name="uploadedfile">
                <br><input value="Send" type="submit" name="add">
            </form>
        </div>
        <div>
           
        </div>
        <div class="action">
            <h2>Give it a try before you commit.</h2>
            <p>You will get various attractive promos from our website. Just give us your email address, and
                we'll send you the details:</p>
            <form action="./validasi-email.php" method="POST">
                <center><input type="email" name="email" placeholder="Enter your email address" required="required" />
                    <button type="submit" name="email-home">Sign Up Now! <i class="fas fa-plane    "></i></button>
                </center>
            </form>
        </div>
        <!-- Footer
================================================== -->
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