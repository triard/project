<?php
require_once "../config/koneksi.php";

session_start();
$id = $_GET['id_jd'];
$idUser = $_GET['idUser'];
switch ($_GET['act']) {
    case 'del':
        $sql = "delete from cart where id_jd = $id && id_user = $idUser";
        // echo $sql; die;
        break;

    case 'drop':
        $sql = "delete from cart where id_user = $idUser";
        break;
}



mysqli_query($db, $sql);
if ($_GET['act'] != 'store') {
    header("location:./cart.php");
} else {
    header("location:./cart.php");
}
?>