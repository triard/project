<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Dashboard user</title>
        <link rel="stylesheet" type="text/css" href="../assets/css/style-user.css">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
            integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
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
            <div class="card" style="margin-top:7%; width:80%; margin-left:10%;">
            <h2>Isi Formulir Data Penumpang </h2>
                <div>
                    <form action="./confirm-pembelian.php" method="POST">
                        <div class="kotak">
                            <?php session_start();?>

                            <?php for($i=0; $i<$_GET['jml']; $i++){ ?>
                            <table class="table-info">
                                <tr>
                                    <b>Isi Form Data ke-<?= $i+1 ?></b>
                                    <input type="hidden" name="idUser" value="<?php echo $_SESSION['id']; ?>">
                                    <input type="hidden" name="tanggal" value="<?php echo date('Y-m-d') ;?>">
                                </tr>
                                <tr>
                                    <td>
                                        <p>Nama lengkap*</p>
                                        <input type="text" name="nama[]" placeholder="nama lengkap.."
                                            required="required">
                                    </td>
                                    <td>
                                        <p>>= 17 tahun nomor ID (KTP,SIM,Pasport) *</p>
                                        <input type="text" name="no_identitas[]" placeholder="no id.."
                                            required="required">
                                        <p>
                                            < 17 tahun jika tidak memiliki ID diisi tanggal lahir format hhbbtttt</p>
                                                <br>
                                    </td>
                                </tr>
                            </table>
                            <?php
                    } ?>
                            <table class="table-info " style="width:20%;">
                                <tr>
                                    <td><input value="add" type="submit" name="add"></td>
                                </tr>
                            </table>

                        </div>
                </div>
                </form>
            </div>
            <br><br>
           
        </div>
         <div class="action">
                <h2>Give it a try before you commit.</h2>
                <p>You will get various attractive promos from our website. Just give us your email address, and
                    we'll send you the details:</p>
                <form action="./validasi-email.php" method="POST">
                    <center><input type="email" name="email" placeholder="Enter your email address"
                            required="required" />
                        <button type="submit" name="email-home">Sign Up Now! <i class="fas fa-plane    "></i></button>
                    </center>
                </form>
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