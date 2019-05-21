<?php
session_start();
include("../config/koneksi.php");

// cek apakah tombol daftar sudah diklik atau blum?
      // ambil data dari formulir
  $id_jd = $_GET['id_jd'];
  $id_user=$_SESSION['id'];
  $jml=$_GET['jml'];
//   echo $id_jd; echo $id_user; echo $jml; die;
  

    // buat query
    $sql = "INSERT INTO cart (id_jd,id_user,qty) VALUE ('$id_jd','$id_user', '$jml')";
    // echo $sql; die;
    $query = mysqli_query($db, $sql);


    // apakah query simpan berhasil?
    if( $query ) {
                // kalau berhasil alihkan ke halaman indek.php dengan status=sukses
        ?>
        <script>
        alert("Thanks! Your order will be shipped :)");
        document.location = './index.php';
        </script>
    <?php    
    } else {
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        header('Location:./index.php?status=gagal');
    }
    
?>
