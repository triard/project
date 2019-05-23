<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../../assets/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Francois+One|Pacifico" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <title>promo</title>
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
                <a href="#promo">
                    <div> <i class="fas fa-percent    "></i> Promo</div>
                </a>
                 <a href="../Cart/cart.php">
                    <div><i class="fas fa-cart-arrow-down    "></i> Cart</div>
                </a>
            </td>
            <td class="content">
                <br><br><br>
                <div>
                <h3><i class="fas fa-percent    "></i> Promosi</h3>
                    <table class="kotak" style="width:95%; margin:30px;">
                        <thead>
                            <tr class="kotak-judul" style="height:60px;">
                                <th>id</th>
                                <th>Nama</th>
                                <th>descripsi</th>
                                <th>Image</th>
                                <th>---Aksi---</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            include '../../config/koneksi.php';
                            $sql = "SELECT * FROM iklan";
                            $query = mysqli_query($db, $sql);

                            while ($iklan = mysqli_fetch_array($query)) {
                                echo "<tr class='kotak-form' style='text-align:center; height:60px;'>";
                                echo "<td>" . $iklan['id'] . "</td>";
                                echo "<td>" . $iklan['nama'] . "</td>";
                                echo "<td>" . $iklan['deskripsi'] . "</td>";
                                echo "<td> <img style='height:90px; widht:90px;' src='./img/" . $iklan['img'] . "'></td>";
                                echo "<td>";
                                echo "<a class='button' href='./update-iklan.php?id=" . $iklan['id'] . "'><img src='../../assets/icon/edit.png'></a> | ";
                                echo "<a class='button' href='./hapus.php?id=" . $iklan['id'] . "'><img src='../../assets/icon/delete.png'> </a>";
                                echo "</td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                        <br>
                    </table>
                    
                <div>
                    <form enctype="multipart/form-data" action="./proses.php" method="post">
                        <div class="kotak" style="margin-bottom:150px; height:450px; width:300px; margin-left:200px;">
                            <div class="kotak-judul"><b>+ADD STASIUN</b></div>
                            <div class="kotak-user">
                                <input type="hidden" name="id" value="<?php echo $id['id']; ?>">
                                <input class="input-style" type="text" name="nama" placeholder="nama iklan .." required="required">
                                <p>Deskripsi</p>
                                <textarea  name="descripsi" cols="30" rows="10"></textarea>
                                <input type="file" name="uploadedfile">
                                <br><input class="btn-submit" value="++add" type="submit" name="add">
                            </div>
                        </div>
                    </form>
                </div>
                </div>
            </td>
        </tr>

    </table>
    <div class="footer">
        Copyright &copy; 2019
        Designed by lets_go
    </div>
</body>

</html>