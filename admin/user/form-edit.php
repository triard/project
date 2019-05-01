<?php

include("../../config/koneksi.php");

// kalau tidak ada id di query string
if( !isset($_GET['id']) ){
    header('Location: ../user/user.php');
}

//ambil id dari query string
$id = $_GET['id'];

// buat query untuk ambil data dari database
$sql = "SELECT * FROM user WHERE id=$id";
$query = mysqli_query($db, $sql);
$user = mysqli_fetch_assoc($query);

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
            <a href="/login/logout.php">LOGOUT</a>
        </div>
        <table>
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
                        <div class="kotak" style="margin:0px 0px 0px 300px; width:300px;">
                            <div class="kotak-judul"><b>Update</b></div>
                            <div class="kotak-user">
                                <input type="hidden" name="id" value="<?php echo $user['id'] ?>" />
                                <input type="text" class="input-style" name="full_name" placeholder="nama lengkap"
                                    value="<?php echo $user['full_name'] ?>" />
                                <input type="text" class="input-style" name="username" placeholder="nama"
                                    value="<?php echo $user['username'] ?>" />
                                <br><label style="font-size:20px;">Jenis Kelamin</label> <br>
                                <?php $gender = $user['gender']; ?>
                                <label><input type="radio" name="gender" value="Laki-Laki"
                                        <?php echo ($gender == 'Laki-:Laki') ? "checked": "" ?>> Laki-Laki</label>
                                <label><input type="radio" name="gender" value="Perempuan"
                                        <?php echo ($gender == 'Perempuan') ? "checked": "" ?>> Perempuan</label>
                                <input type="text" class="input-style" name="kontak" placeholder="kontak"
                                    value="<?php echo $user['kontak'] ?>" />
                                <input type="text" class="input-style" name="email" placeholder="email"
                                    value="<?php echo $user['email'] ?>" />
                                <input type="hidden" name="pass" value="<?php echo $user['pass'] ?>" />
                                <input type="hidden" name="level" value="<?php echo $user['level'] ?>" />
                                <br><input type="submit" value="Simpan" name="simpan" />
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