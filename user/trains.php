<?php
require("../login/validasi.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard user</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/style-user.css">
    <script src="../assets/js/jquery-3.3.1.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Secular+One|Bai+Jamjuree|Lalezar|Yellowtail|Kaushan+Script|Amaranth|Fredoka+One|Kaushan+Script|Yellowtail" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>

<body>

    <div class="header">
        <a href="#default" class="logo">let's go!</a>
        <div class="header-right">
            <a href="./index.php">Home</a>
            <a class="active" href="#Trains">Trains</a>
            <a href="./cart.php">Confrim</a>
            <a href="./indexKontak.php">Contact</a>
            <a href="./aboutus.php">About</a>
            <a href="../login/index.php">Log out</a>
        </div>
    </div>
    <table class="container">
        <tr>
            <td class="form">
          <div>
                    <form action="../user/cari-tiket.php"  method="post">
                        <div class="box-cari">
                            <h3>Pesan Tiket</h3>     
                                <?php
                                include("../config/koneksi.php");
                                $sql = "SELECT * FROM stasiun ORDER BY id_st ASC";
                                $query = mysqli_query($db, $sql);
                                ?>
                                <div class="input-icon">
                                    <select name="asal" class="form-search">
                                        <option>Stasiun Asal</option>
                                        <?php
                                    mysqli_num_rows($query) ?>
                                        <?php while ($row = mysqli_fetch_array($query)) {
                                            $kereta=$row['id_st'];
                                        $st=mysqli_query($db, "SELECT stasiun from stasiun where id_st=$kereta");
                                        $nmst = mysqli_fetch_array($st) ?>
                                            <option value="<?php echo $row['id_st']; ?>"><?php echo $nmst['stasiun']; ?></option>
                                        <?php } ?>
                                    
                                    </select>
                                    <i class="fas fa-map-marker-alt    "></i>
                                </div>
                                <div class="input-icon">
                                <?php
                                include("../config/koneksi.php");
                                $sql = "SELECT * FROM stasiun ORDER BY id_st ASC";
                                $query = mysqli_query($db, $sql);
                                ?>
                                <select name="tujuan" class="form-search">
                                    <option>Tujuan Stasiun</option>
                                    <?php
                                    if (mysqli_num_rows($query) > 0) { ?>
                                        <?php while ($row = mysqli_fetch_array($query)) {
                                            $kereta=$row['id_st'];
                                        $st=mysqli_query($db, "SELECT stasiun from stasiun where id_st=$kereta");
                                        $nmst = mysqli_fetch_array($st) ?>
                                            <option value="<?php echo $row['id_st']; ?>"><?php echo $nmst['stasiun']; ?></option>
                                        <?php } ?>
                                    <?php } ?>
                                </select>
                                    <i class="fas fa-map-marker-alt    "></i>
                                </div>
                                <br>
                                <div class="input-icon">
                                    <input id="date" class="form-search" type="date" name="berangkat" min="<?php echo date('Y-m-d'); ?>" placeholder="jadwal" required="required" >
                                    <i class="fas fa-calendar    "></i>
                                </div>
                                <br>
                                <div class="input-icon">
                                     <select name="penumpang" class="form-search">
                                     <?php for($i=1; $i<=4; $i++){ ?>
                                        <option value="<?= $i ?>"><?= $i ?> penumpang</option>
                                            <?php }; ?>
                                    </select>
                                    <i class="fas fa-user-alt    "></i>
                                </div>
                                <br>
                                <button class="btn-submit"><i class="fas fa-search    "></i><input value="Search" type="submit" name="submit"></button>
                        </div>
                </div>
                </form>
                </div>
            </td>
            <td class="content">
             <div id="tittle" >
                <center><h2>CARI TIKET KERETA ANDA !!!</h2>
                <p>Anda dapat melakukan pemesanan tiket kereta api online dengan mudah</p><center>
            </div>
            </td>
        </tr>
    </table>
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