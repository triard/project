<?php

include("../../config/koneksi.php");

// kalau tidak ada id di query string
if( !isset($_GET['id_st']) ){
    header('Location: ./stasiun.php');
}

//ambil id dari query string
$id = $_GET['id_st'];

// buat query untuk ambil data dari database
$sql = "SELECT * FROM stasiun WHERE id_st=$id";
$query = mysqli_query($db, $sql);
$stasiun = mysqli_fetch_assoc($query);

// jika data yang di-edit tidak ditemukan
if( mysqli_num_rows($query) < 1 ){
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
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Francois+One" rel="stylesheet"> 
    <title>Formulir Edit</title>
</head>

<body>

    <div class="header">
        <br>
            <p>let's go</p>
            <a href="logout.php">LOGOUT</a>
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
            <br><br><br>
            <h3>Update data</h3>

            <form action="../update/proses-edit.php" method="POST">
            <div class="kotak" style="height:150px;">
                <div class="kotak-judul"><b>Update</b></div>
                <div class="kotak-user">
                <input type="hidden" name="id_st" value="<?php echo $stasiun['id_st'] ?>" />
                <input type="text" class="input-style" name="stasiun" placeholder="nama stasiun" value="<?php echo $stasiun['stasiun'] ?>" />
                 <input type="submit" value="Simpan" name="simpan-stasiun" />
                 <a href="../admin/stasiun.php">Back</a>

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

    </body>
</html>
