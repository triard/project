<?php
session_start();
$idUser = $_POST['idUser'];
$nama = $_POST['nama'];
$no_identitas = $_POST['no_identitas'];

require_once "../config/koneksi.php";

$addTrans = mysqli_query($db, "insert into headtransaksi(id_user) values($idUser)");

$sqlIdTrans = mysqli_query($db, "select * from headtransaksi where id_user = '$idUser' order by id_trans desc limit 1");

$idTrans = mysqli_fetch_array($sqlIdTrans);
$sqlCart = mysqli_query($db, "select * from cart where id_user = '$idUser'");
while ($rowCart = mysqli_fetch_array($sqlCart)) {
    $updStok = mysqli_query($db, "update jadwal set kursi = kursi - $rowCart[2] where id_jd = $rowCart[1]");

    $sqlProduct = mysqli_query($db, "select * from jadwal where id_jd = $rowCart[1]");

    $rowProduct = mysqli_fetch_array($sqlProduct);

    $sub = $rowCart[2] * $rowProduct[7];

    $addTransDetail = mysqli_query($db, "insert into detailtransaksi values ('$idTrans[0]','$rowCart[1]','$rowProduct[7]','$rowCart[2]','$sub')");
    // echo $addTransDetail; die;
}

$sqlGrandTotal = mysqli_query($db, "select sum(subtotal) from detailtransaksi where id_trans = '$idTrans[0]'");
$grandTotal = mysqli_fetch_array($sqlGrandTotal);
if ($addTransDetail) {
    mysqli_query($db, "update headtransaksi set grandtotal = $grandTotal[0] where id_trans = '$idTrans[0]'");


    $jumlahdata=count($nama);
    for($x=0;$x<$jumlahdata;$x++){
    mysqli_query($db, "insert into penumpang(id_trans,nama,no_identitas) values ('$idTrans[0]','$nama[$x]','$no_identitas[$x]')");
  }
    mysqli_query($db, "delete from cart where id_user = $idUser");
}
?>

<script>
    alert("Thanks! Your order will be shipped :)");
    document.location = './index.php';
</script>