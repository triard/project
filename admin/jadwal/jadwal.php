<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../../assets/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Pacifico|Francois+One" rel="stylesheet">
    <link href="../../assets/css/datetimepicker.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
    <title>jadwal kereta</title>
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
                <a href="#jadwal">
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
                <br><br>
                <h3>Jadwal Kereta</h3>
                <div>
                    <form action="../create/proses_registrasi.php" method="POST">
                        <div class="kotak" style="width:28%; float:right; height:740px; margin-top:-70px;">
                            <div class="kotak-judul"><b>+ADD JADWAL</b></div>
                            <div class="kotak-user" style="height:650px;">
                                <input type="hidden" name="id_jd" value="<?php echo $id_jd['id_jd']; ?>">
                                <input class="input-style" type="text" name="nama_kr" placeholder="Nama Kereta .." required="required">
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
                                    <input type="hidden" name="tgl_berangkat" id="result" value="" />
                                </div>
                                <label style="font-size:17px;">tanggal tiba:</label>
                                <div style="width: 200px; margin: 5px; font-size:17px;">
                                    <div id="picker2"> </div>
                                    <input type="hidden" name="tgl_tiba" id="result2" value="" />
                                </div>
                                <label style="font-size:20px;">Kelas</label> <br>
                                <select name="kelas" class="input-style">
                                    <option value="eksekutif">eksekutif</option>
                                    <option value="bisnis">bisnis</option>
                                    <option value="ekonomi">ekonomi</option>
                                </select>
                                <input class="input-style" type="text" name="kursi" placeholder="jumlah kursi.." required="required">
                                <br>
                                <input class="input-style" type="text" name="harga" placeholder="Rp .." required="required">
                                <br><label style="font-size:20px;">Status</label> <br>
                                <br><input class="btn-submit" value="++add" type="submit" name="add_jd">
                            </div>
                        </div>
                    </form>
                </div>
                <div>
                    <table class="kotak" style="width:55%; float:left; margin-bottom:200px;">
                        <thead>
                            <tr class="kotak-judul" style="height:50px;">
                                <th>id</th>
                                <th>nama kereta</th>
                                <th>asal</th>
                                <th>tujuan</th>
                                <th>tanggal berangkat</th>
                                <th>tanggal tiba</th>
                                <th>kelas</th>
                                <th>Harga</th>
                                <th>Jumlah<br>Kursi</th>
                                <th>tindakan</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            include '../../config/koneksi.php';
                            $sql = "SELECT * FROM jadwal";
                            $query = mysqli_query($db, $sql);
                            while ($jadwal = mysqli_fetch_array($query)) {
                            $kereta=$jadwal['asal'];
                            $st=mysqli_query($db, "SELECT stasiun from stasiun where id_st=$kereta");
                            $nmst = mysqli_fetch_array($st);
                                echo "<tr class='kotak-form' style='text-align:center; height:80px;'>";
                                echo "<td>" . $jadwal['id_jd'] . "</td>";
                                echo "<td>" . $jadwal['nama_kr'] . "</td>";
                                echo "<td>" . $nmst['stasiun'] . "</td>";
                                $kereta1=$jadwal['tujuan'];
                                $st1=mysqli_query($db, "SELECT stasiun from stasiun where id_st=$kereta1");
                                $nmst1 = mysqli_fetch_array($st1);
                                echo "<td>" . $nmst1['stasiun'] . "</td>";
                                echo "<td>" . $jadwal['tgl_berangkat'] . "</td>";
                                echo "<td>" . $jadwal['tgl_tiba'] . "</td>";
                                echo "<td>" . $jadwal['kelas'] . "</td>";
                                echo "<td>" . $jadwal['harga'] . "</td>";
                                echo "<td>" . $jadwal['kursi'] . "</td>";

                                echo "<td>";
                                echo "<a class='button' href='../jadwal/update-jadwal.php?id_jd=" . $jadwal['id_jd'] . "'><img src='../../assets/icon/edit.png'></a> | ";
                                echo "<a class='button' href='../delete/hapus.php?id_jd=" . $jadwal['id_jd'] . "'><img src='../../assets/icon/delete.png'> </a>";
                                echo "</td>";

                                echo "</tr>";
                            } 
                            ?>
                        </tbody>
                        <br>
                    </table>
                </div>
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