<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../../assets/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Pacifico|Francois+One" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <title>stasiun</title>
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
                <a href="#stasiun">
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
                <br><br>
                <h3><i class="fas fa-subway    "></i> Stasiun</h3>
                <div>
                    <form action="../create/proses_registrasi.php" method="post">
                        <div class="kotak" style="height:200px; float:right; width:300px; margin-right:50px; margin-top:30px;">
                            <div class="kotak-judul"><b>+ADD STASIUN</b></div>
                            <div class="kotak-user">
                                <input type="hidden" name="id_st" value="<?php echo $id_st['id_st']; ?>">
                                <input class="input-style" type="text" name="stasiun" placeholder="Stasiun .." required="required">
                                <br><input class="btn-submit" value="++add" type="submit" name="add_st">
                            </div>
                        </div>
                    </form>
                </div>
                <div>
                    <table class="kotak" style="width:60%; float:left;">
                        <thead>
                            <tr class="kotak-judul" style="height:60px;">
                                <th>id</th>
                                <th>Stasiun</th>
                                <th>Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            include '../../config/koneksi.php';
                            $sql = "SELECT * FROM stasiun";
                            $query = mysqli_query($db, $sql);

                            while ($stasiun = mysqli_fetch_array($query)) {
                                echo "<tr class='kotak-form' style='text-align:center; height:60px;'>";
                                echo "<td>" . $stasiun['id_st'] . "</td>";
                                echo "<td>" . $stasiun['stasiun'] . "</td>";
                                echo "<td>";
                                echo "<a class='button' href='../station/update-stasiun.php?id_st=" . $stasiun['id_st'] . "'><img src='../../assets/icon/edit.png'></a> | ";
                                echo "<a class='button' href='../delete/hapus.php?id_st=" . $stasiun['id_st'] . "'><img src='../../assets/icon/delete.png'> </a>";
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