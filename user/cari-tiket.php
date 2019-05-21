<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard user</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/style-user.css">
    <script src="../assets/js/jquery-3.3.1.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Secular+One|Bai+Jamjuree|Lalezar|Yellowtail|Kaushan+Script|Amaranth|Fredoka+One|Kaushan+Script|Yellowtail" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
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
    <table class="container" style="height:300px;">
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
                                    <i class="fas fa-calendar-alt    "></i>
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
             <div id="tittle">
                <center><h2>CARI TIKET KERETA ANDA !!!</h2>
                <p>Anda dapat melakukan pemesanan tiket kereta api online dengan mudah</p><center>
            </div>
            </td>
        </tr>
    </table>
    <div id="search">
                    <p>results</p><br>
                    <h2><?php 
                    $asal = $_POST["asal"];
                    $query ="SELECT stasiun from stasiun where id_st=$asal";
                              $result=mysqli_query($db,$query); 
                              $rows=mysqli_fetch_array($result);
                    echo $rows["stasiun"];?> ke 
                    <?php $tujuan = $_POST["tujuan"];
                    $query ="SELECT stasiun from stasiun where id_st=$tujuan";
                              $result=mysqli_query($db,$query); 
                              $rows=mysqli_fetch_array($result);
                    echo $rows["stasiun"];?></h2>
                    <p><i class="fas fa-calendar-alt    "></i>&nbsp;&nbsp;<?php echo $_POST["berangkat"];?>&nbsp;&nbsp;&nbsp;&nbsp;
                    <i class="fas fa-user-alt    "></i> &nbsp;&nbsp; <?php echo $_POST["penumpang"];?>
                
                </p>
                <hr style="color:white;">    
                    </div>
               
    </div>
                   
                    <table class="box-view">
                        <tr>
                            <th>Nama KA</th>
                            <th>Asal <br> stasiun</th>
                            <th>Tujuan <br> stasiun</th>
                            <th>waktu <br> berangkat</th>
                            <th>waktu <br> tiba</th>
                            <th>harga</th>
                            <th>Aksi</th>
                        </tr>
                        
                        <?php
                        if (isset($_POST['submit'])) {
                        $asal = $_POST['asal'];
                        $tujuan = $_POST['tujuan'];
                        $berangkat = $_POST['berangkat'];
                        $query2 = "SELECT * FROM jadwal WHERE asal LIKE '%$asal%' AND tujuan LIKE '%$tujuan%' AND tgl_berangkat LIKE '%$berangkat%'";
                        $sql = mysqli_query($db, $query2);
                        $cek = mysqli_num_rows($sql);
                        if($cek>0){
                        while ($r = mysqli_fetch_array($sql)) {
                            ?>
                        <tr>
                            <td><?php echo $r['nama_kr']; ?>
                               (<?php echo $r['id_jd']; ?>)
                            <br><?php echo $r['kelas']; ?></td>
                            <td><?php echo $r['asal']; ?></td>
                            <td><?php echo $r['tujuan']; ?></td>
                            <td><?php echo $r['tgl_berangkat']; ?></td>
                            <td><?php echo $r['tgl_tiba']; ?></td>
                            <td><?php echo 'Rp.' . $r['harga']; ?></td>
                            <?php
                                echo "<td>";
                                echo "<a name='a' id='pesan' href='./proses-cart.php?id_jd=" . $r['id_jd'] . "&&jml=".$_POST['penumpang']."'>pesan</a>";
                                echo "</td>";
                                ?>
                        </tr>
                        <?php }
                        }else{
                    echo "
                     <p style='font-size:90px; text-align:center;'><i class='fas fa-exclamation-triangle    '></i></p> <br>
                     <p style='font-size:30px; text-align:center;'> <b>Trains Not Available</b><br>
                     There are no trains matching your search criteria. Please modify your search.</p>";
                }
                }?>
                </table>
                <br>
    <div class="action">
            <h2>Give it a try before you commit.</h2>
            <p>You will get various attractive promos from our website. Just give us your email address, and
                we'll send you the details:</p>
            <form action="./validasi-email.php" method="POST">
                <center><input type="email" name="email" placeholder="Enter your email address" required="required"/>
            <button type="submit" name="email-home">Sign Up Now! <i class="fas fa-plane    "></i></button>
            </center>
            </form>
        </div>

        <!-- Footer
================================================== -->
        <footer>
            <nav>
                <ul>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms</a></li>
                </ul>
            </nav>
            <p>&copy; 2019. lets.go. All Rights Reserved.</p>
        </footer>
</body>
<!-- <script>
    alert("pesanan telah diproses silahkan untuk membayar)");
    document.location = './index.php';
</script> -->
</html>