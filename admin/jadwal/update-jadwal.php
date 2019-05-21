<?php

include("../../config/koneksi.php");

// kalau tidak ada id di query string
if (!isset($_GET['id_jd'])) {
    header('Location: jadwal.php');
}

//ambil id dari query string
$id = $_GET['id_jd'];

// buat query untuk ambil data dari database
$sql = "SELECT * FROM jadwal WHERE id_jd=$id";
$query = mysqli_query($db, $sql);
$jadwal = mysqli_fetch_assoc($query);

// jika data yang di-edit tidak ditemukan
if (mysqli_num_rows($query) < 1) {
    die("data tidak ditemukan...");
}

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../../assets/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Pacifico|Francois+One" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <title>Formulir Edit</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="../../assets/css/datetimepicker.css" rel="stylesheet" type="text/css" />
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.0/moment-with-locales.min.js"></script>
    <script type="text/javascript" src="../../assets/js/datetimepicker.js"></script>
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <script type="text/javascript">
        $(document).ready(function() {
            $('#picker').dateTimePicker();
            $('#picker2').dateTimePicker();
        })
    </script>
</head>

<body>

    <div class="header">
        <br>
        <p>let's go</p>
        <a href="../../login/logout.php"><button>LOGOUT</button></a>
    </div>
    <table style="border-collapse:collapse;">
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
                 <a href="../Cart/cart.php">
                    <div><i class="fas fa-cart-arrow-down    "></i> Cart</div>
                </a>
            </td>
            <td class="content">
                <br><br><br>
                <h3>Update Jadwal</h3>

                <form action="../update/proses-edit.php" method="POST">
                    <div class="kotak" style="margin:0px 0px 0px 200px; height:550px; width:700px;">
                        <div class="kotak-judul"><b>Update</b></div>
                        <div class="kotak-user" style="width:800px; margin:0px 0px 0px 140px; padding:30px;">

                            <input type="hidden" name="id_jd" value="<?php echo $jadwal['id_jd'] ?>" />
                            <input type="text" class="input-style" name="nama_kr" placeholder="nama kereta" value="<?php echo $jadwal['nama_kr'] ?>" />
                            <br><label style="font-size:20px;">Asal</label> <br>
                                <?php
                                include("../../config/koneksi.php");
                                $sql = "SELECT * FROM stasiun ORDER BY id_st ASC";
                                $query = mysqli_query($db, $sql);
                                ?>
                                <select name="asal" class="input-style">
                                    <option>pilih stasiun</option>
                                    <?php
                                    if (mysqli_num_rows($query) > 0) { ?>
                                        <?php while ($row = mysqli_fetch_array($query)) {
                                            $kereta=$row['id_st'];
                                        $st=mysqli_query($db, "SELECT stasiun from stasiun where id_st=$kereta");
                                        $nmst = mysqli_fetch_array($st)
                                            ?>
                                            <option value="<?php echo $row['id_st']; ?>"><?php echo $nmst['stasiun'] ?></option>
                                        <?php } ?>
                                    <?php } ?>
                                </select>

                            <br><label style="font-size:20px;">Tujuan</label> <br>
                                <?php
                                include("../../config/koneksi.php");
                                $sql = "SELECT * FROM stasiun ORDER BY id_st ASC";
                                $query = mysqli_query($db, $sql);
                                ?>
                                <select name="tujuan" class="input-style">
                                    <option>pilih stasiun</option>
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
                            <br><label style="font-size:17px;">tanggal berangkat:</label>
                            <div style="width: 200px; align:left; font-size:17px;">
                                <div id="picker"> </div>
                                <input type="datetime-local" min="date('Ymd')" name="tgl_berangkat" id="result" value="<?php echo $jadwal['tgl_berangkat'] ?>" />
                            </div>
                            <label style="font-size:17px;">tanggal tiba:</label>
                            <div style="width: 200px; margin: 5px; font-size:17px;">
                                <div id="picker2"> </div>
                                <input type="text" name="tgl_tiba" id="result2" value="<?php echo $jadwal['tgl_tiba'] ?>" />
                            </div>
                            <label style="font-size:20px;">Kelas</label>
                            <select name="kelas" class="input-style">
                                <option value="eksekutif">eksekutif</option>
                                <option value="bisnis">bisnis</option>
                                <option value="ekonomi">ekonomi</option>
                            </select>
                            <input type="text" name="kursi"  value="<?php echo $jadwal['kursi'] ?>" />
                            <input class="btn-submit" type="submit" value="Simpan" name="simpan-jadwal" />
                            <a class="btn-submit" href="../jadwal/jadwal.php" style="background-color:#f44336;">Back</a>
                        </div>
                    </div>
                    </div>
                    <br><br><br><br><br>
                    <br><br>
                </form>
            </td>
        </tr>

    </table>
    <div class="footer">
        Copyright &copy; 2019
        Designed by lets_go
    </div>
    <script type="text/javascript">
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-36251023-1']);
        _gaq.push(['_setDomainName', 'jqueryscript.net']);
        _gaq.push(['_trackPageview']);

        (function() {
            var ga = document.createElement('script');
            ga.type = 'text/javascript';
            ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') +
                '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(ga, s);
        })();
    </script>
</body>

</html>