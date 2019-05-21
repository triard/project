<?php
include("../../config/koneksi.php");
// kalau tidak ada id di query string
if (!isset($_GET['id'])) {
    header('Location: ./iklan.php');
}
//ambil id dari query string
$id = $_GET['id'];
// buat query untuk ambil data dari database
$sql = "SELECT * FROM iklan WHERE id=$id";
$query = mysqli_query($db, $sql);
$iklan = mysqli_fetch_assoc($query);
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
    <link href="https://fonts.googleapis.com/css?family=Francois+One|Pacifico" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <title>Formulir Edit</title>
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
                <a href="../jadwal/jadwal.php">
                    <div> <i class="fas fa-calendar-alt    "></i> Schedule</div>
                </a>
                <a href="./iklan.php">
                    <div> <i class="fas fa-percent    "></i> Promo</div>
                </a>
                 <a href="../Cart/cart.php">
                    <div><i class="fas fa-cart-arrow-down    "></i> Cart</div>
                </a>
            </td>
            <td class="content">
                <br><br><br>
                <h3>Update iklan</h3>

                <form enctype="multipart/form-data" action="./proses-edit.php" method="POST">
                    <div class="kotak" style="height:480px;">
                        <div class="kotak-judul"><b>Update</b></div>
                        <div class="kotak-user">
                            <h6 style="margin-top:5px; margin-bottom:10px;">Topik</h6>
                            <input type="hidden" name="id" value="<?php echo $iklan['id'] ?>" />
                            <input class="input-style" type="text" name="nama" value="<?php echo $iklan['nama'] ?>" />
                            <h6 style="margin-top:5px; margin-bottom:10px;">Deskripsi</h6>
                            <textarea name="deskripsi" cols="30" rows="10" ><?php echo $iklan['deskripsi'] ?></textarea>
                            <h6 style="margin-top:5px; margin-bottom:-20px;">Select Image</h6>
                            <br><input type="file" name="uploadedfile"/>
                            <br><input class="btn-submit" type="submit" value="Simpan" name="simpan" />
                            <a class="btn-submit" href="./iklan.php" style="background-color:#f44336;">Back</a>
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