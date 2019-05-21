<?php

include("../../config/koneksi.php");

if( isset($_GET['id']) ){

    // ambil id dari query string
    $id = $_GET['id'];

    // buat query hapus
    $sql = "DELETE FROM iklan WHERE id=$id";
    $query = mysqli_query($db, $sql);

    // apakah query hapus berhasil?
    if( $query ){
        header('Location: ./iklan.php');
    } else {
        header('Location: ./iklan.php');
    }

}else {
    die("akses dilarang...");
}

?>
