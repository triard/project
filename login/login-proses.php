<?php
include("../config/koneksi.php");
// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['daftar'])){
    // ambil data dari formulir
  $username = $_POST['username'];
  $nama_lengkap = $_POST['full_name'];
  $gender = $_POST['gender'];
  $no_hp = $_POST['kontak'];
  $email = $_POST['email'];
  $pass = md5($_POST['pass']);

    // buat query
    $sql = "INSERT INTO user (username,full_name, gender, kontak, email, pass) VALUE ('$username','$nama_lengkap', '$gender', '$no_hp', '$email', '$pass')";
    $query = mysqli_query($db, $sql);

    // apakah query simpan berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman indek.php dengan status=sukses
        header('Location: index.php?status=sukses');
    } else {
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        header('Location: index.php?status=gagal');
    }

  }else {
    die("Akses dilarang...");
}

?>