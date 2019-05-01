<?php

include("../../config/koneksi.php");

if( isset($_GET['id']) ){

    // ambil id dari query string
    $id = $_GET['id'];

    // buat query hapus
    $sql = "DELETE FROM user WHERE id=$id";
    $query = mysqli_query($db, $sql);

    // apakah query hapus berhasil?
    if( $query ){
        header('Location: ../user/user.php');
    } else {
        die("gagal menghapus...");
    }

}else if( isset($_GET['id_st']) ){
    // ambil id dari query string
    $id = $_GET['id_st'];

    // buat query hapus
    $sql = "DELETE FROM stasiun WHERE id_st=$id";
    
    $query = mysqli_query($db, $sql);
    // apakah query hapus berhasil?
    if( $query ){
        header('Location: ../station/stasiun.php');
    } else {
        die("gagal menghapus...");
    }

}else if( isset($_GET['id_jd']) ){

    // ambil id dari query string
    $id = $_GET['id_jd'];

    // buat query hapus
    $sql = "DELETE FROM jadwal WHERE id_jd=$id";
    $query = mysqli_query($db, $sql);

    // apakah query hapus berhasil?
    if( $query ){
        header('Location: ../jadwal/jadwal.php');
    } else {
        die("gagal menghapus...");
    }

}
 else {
    die("akses dilarang...");
}

?>
