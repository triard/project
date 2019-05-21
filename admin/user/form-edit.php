<?php

include("../../config/koneksi.php");

// kalau tidak ada id di query string
if (!isset($_GET['id'])) {
    header('Location: ../user/user.php');
}

//ambil id dari query string
$id = $_GET['id'];

// buat query untuk ambil data dari database
$sql = "SELECT * FROM user WHERE id=$id";
$query = mysqli_query($db, $sql);
$user = mysqli_fetch_assoc($query);

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
    <table>
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
                <h3>Update data</h3>

                <form action="../update/proses-edit.php" method="POST">
                    <div class="kotak" style="margin:0px 0px 0px 300px; width:600px; height:300px;">
                        <div class="kotak-judul"><b>Update</b></div>
                        <div class="kotak-user">
                            <input type="hidden" name="id" value="<?php echo $user['id'] ?>" />
                            <input type="text" class="input-style" name="full_name" placeholder="nama lengkap" value="<?php echo $user['full_name'] ?>" />
                            <input type="text" class="input-style" name="username" placeholder="nama" value="<?php echo $user['username'] ?>" />
                            <br><label style="font-size:20px;">Jenis Kelamin</label> <br>
                            <?php $gender = $user['gender']; ?>
                            <label class="btn-rd" for="rd1">Laki-Laki
                                <input type="radio" name="gender" id="rd1" value="Laki-Laki" <?php echo ($gender == 'Laki-Laki') ? "checked" : "" ?>>
                                <span class="checkmark"></span>
                            </label>
                            <label class="btn-rd" for="rd2">Perempuan
                                <input type="radio" name="gender" id="rd2" value="Perempuan" <?php echo ($gender == 'Perempuan') ? "checked" : "" ?>>
                                <span class="checkmark"></span>
                            </label>
                            <input type="text" class="input-style" name="kontak" placeholder="kontak" value="<?php echo $user['kontak'] ?>" />
                            <input type="text" class="input-style" name="email" placeholder="email" value="<?php echo $user['email'] ?>" />
                            <input type="hidden" name="pass" value="<?php echo $user['pass'] ?>" />
                            <input type="hidden" name="level" value="<?php echo $user['level'] ?>" />
                            <br><input class="btn-submit" type="submit" value="Simpan" name="simpan" />
                            <a class="btn-submit" href="../user/user.php" style="background-color:#f44336;">Back</a>
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