<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" type="text/css" href="../../assets/css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Francois+One" rel="stylesheet">
        <title>user page</title>
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
                    <h3>Users</h3>
                    <div>
                        <form action="../create/proses_registrasi.php" method="post">
                            <div class="kotak" style="width:30%; float:right;">
                                <div class="kotak-judul"><b>+add user</b></div>
                                <div class="kotak-user">
                                    <input type="hidden" name="id" value="<?php echo $id['id']; ?>">
                                    <input class="input-style" type="text" name="username" placeholder="Username .."
                                        required="required">
                                    <input class="input-style" type="text" name="full_name" placeholder="full name .."
                                        required="required">
                                    <br>
                                    <label style="font-size:20px;">Jenis Kelamin</label> <br>
                                    <input type="radio" name="gender" id="rd1" value="Laki-Laki"> <label
                                        for="rd1">Laki-Laki</label>
                                    <input type="radio" name="gender" id="rd2" value="Perempuan"> <label
                                        for="rd2">Perempuan</label>
                                    <input class="input-style" type="text" name="kontak" placeholder="no_hp"
                                        required="required">
                                    <br>
                                    <input class="input-style" type="email" name="email" placeholder="email .."
                                        required="required">
                                    <input class="input-style" type="password" name="pass" placeholder="password .."
                                        required="required">
                                    <p cosplan="2" align="left"><input value="++add" type="submit" name="add">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div>
                        <table class="kotak" style="width:65%; float:left;">
                            <thead>
                                <tr class="kotak-judul" style="height:60px;">
                                    <th>id</th>
                                    <th>username</th>
                                    <th>nama lengkap</th>
                                    <th>jenis kelamin</th>
                                    <th>no HP</th>
                                    <th>E-mail</th>
                                    <th>level</th>
                                    <th>tindakan</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
        include '../../config/koneksi.php';
        $sql = "SELECT * FROM user";
        $query = mysqli_query($db, $sql);

        while($user = mysqli_fetch_array($query)){
            echo "<tr class='kotak-form' style='text-align:center; height:0px;'>";
            echo "<td>".$user['id']."</td>";
            echo "<td>".$user['username']."</td>";
            echo "<td>".$user['full_name']."</td>";
            echo "<td>".$user['gender']."</td>";
            echo "<td>".$user['kontak']."</td>";
            echo "<td>".$user['email']."</td>";
            echo "<td>".$user['level']."</td>";
            
            echo "<td>";
            echo "<a class='button' href='../user/form-edit.php?id=".$user['id']."'><img src='../../assets/icon/edit.png'></a> | ";
            echo "<a class='button' href='../delete/hapus.php?id=".$user['id']."'><img src='../../assets/icon/delete.png'> </a>";
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
    </body>

</html>