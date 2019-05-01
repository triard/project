<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" type="text/css" href="../../assets/css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Francois+One" rel="stylesheet">
        <link href="../../assets/css/datetimepicker.css" rel="stylesheet" type="text/css" />

        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-1.12.4.min.js"
            integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous">
        </script>
        <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.0/moment-with-locales.min.js"></script>
        <script type="text/javascript" src="../../assets/js/datetimepicker.js"></script>
        <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
        <script type="text/javascript">
            $(document).ready(function () {
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
            <a href="../../login/logout.php">LOGOUT</a>
        </div>
        <table class="container">
            <tr>
                <td colspan="2" class="menu">
                    <div><a href="../dashboard.php"> <img src="../../assets/icon/dashboard.png"> Dashboard</a></div>
                    <div><a href="../user/user.php"> <img src="../../assets/icon/user.png"> User</a></div>
                    <div><a href="../station/stasiun.php"> <img src="../../assets/icon/stasiun.png"> Stasiun</a></div>
                    <div><a href="../jadwal/jadwal.php"> <img src="../../assets/icon/jadwal.png"> Jadwal</a></div>
                </td>
                <td class="content">
                    <br><br>
                    <h3>Jadwal Kereta</h3>
                    <div>
                        <form action="../create/proses_registrasi.php" method="POST">
                            <div class="kotak" style="width:35%; float:right; height:740px; margin-top:-70px;">
                                <div class="kotak-judul"><b>+ADD JADWAL</b></div>
                                <div class="kotak-user" style="height:650px;">
                                    <input type="hidden" name="id_jd" value="<?php echo $id_jd['id_jd']; ?>">
                                    <input class="input-style" type="text" name="nama_kr" placeholder="Nama Kereta .."
                                        required="required">
                                    <br><label style="font-size:20px;">Asal</label> <br>
                                    <?php 
                     include("../../config/koneksi.php");
                     $sql = "SELECT * FROM stasiun ORDER BY stasiun ASC";
                     $query = mysqli_query($db, $sql);
                     ?>
                                    <select name="asal" class="input-style">
                                        <option>pilih stasiun</option>
                                        <?php 
                     if(mysqli_num_rows($query)>0){?>
                                        <?php while($row = mysqli_fetch_array($query)){ ?>
                                        <option><?php echo $row['stasiun']?></option>
                                        <?php } ?>
                                        <?php } ?>
                                    </select>
                                    <br><label style="font-size:20px;">Tujuan</label> <br>
                                    <?php 
                     include("../../config/koneksi.php");
                     $sql = "SELECT * FROM stasiun ORDER BY stasiun ASC";
                     $query = mysqli_query($db, $sql);
                     ?>
                                    <select name="tujuan" class="input-style">
                                        <option>pilih stasiun</option>
                                        <?php 
                     if(mysqli_num_rows($query)>0){?>
                                        <?php while($row = mysqli_fetch_array($query)){ ?>
                                        <option><?php echo $row['stasiun']?></option>
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
                                    <br>
                                    <input class="input-style" type="text" name="harga" placeholder="Rp .."
                                        required="required">
                                    <br><label style="font-size:20px;">Status</label> <br>
                                    <select name="status" class="input-style">
                                        <option value="ADA">ADA</option>
                                        <option value="HABIS">HABIS</option>
                                    </select>
                                    <p cosplan="2"><input value="++add" type="submit" name="add_jd">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div>
                        <table class="kotak" style="width:60%; float:left;">
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
                                    <th>status</th>
                                    <th>tindakan</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
        include '../../config/koneksi.php';
        $sql = "SELECT * FROM jadwal";
        $query = mysqli_query($db, $sql);

        while($jadwal = mysqli_fetch_array($query)){
            echo "<tr class='kotak-form' style='text-align:center; height:80px;'>";
            echo "<td>".$jadwal['id_jd']."</td>";
            echo "<td>".$jadwal['nama_kr']."</td>";
            echo "<td>".$jadwal['asal']."</td>";
            echo "<td>".$jadwal['tujuan']."</td>";
            echo "<td>".$jadwal['tgl_berangkat']."</td>";
            echo "<td>".$jadwal['tgl_tiba']."</td>";
            echo "<td>".$jadwal['kelas']."</td>";
            echo "<td>".$jadwal['harga']."</td>";
            echo "<td>".$jadwal['status']."</td>";
            
            echo "<td>";
            echo "<a class='button' href='../jadwal/update-jadwal.php?id_jd=".$jadwal['id_jd']."'><img src='../../assets/icon/edit.png'></a> | ";
            echo "<a class='button' href='../delete/hapus.php?id_jd=".$jadwal['id_jd']."'><img src='../../assets/icon/delete.png'> </a>";
            echo "</td>";

            echo "</tr>";
        }
        ?>
                            </tbody>
                            <br>
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
        <script type="text/javascript">
            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', 'UA-36251023-1']);
            _gaq.push(['_setDomainName', 'jqueryscript.net']);
            _gaq.push(['_trackPageview']);

            (function () {
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