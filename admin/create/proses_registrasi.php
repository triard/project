<?php
include("../../config/koneksi.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['add'])){
      // ambil data dari formulir
  $username = $_POST['username'];
  $full_name = $_POST['full_name'];
  $gender = $_POST['gender'];
  $kontak = $_POST['kontak'];
  $email = $_POST['email'];
  $pass = md5($_POST['pass']);

    // buat query
    $sql = "INSERT INTO user (username,full_name, gender, kontak, email, pass) VALUE ('$username','$full_name', '$gender', '$kontak', '$email', '$pass')";
    $query = mysqli_query($db, $sql);


    // apakah query simpan berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman indek.php dengan status=sukses
        header('Location: ../user/user.php?status=sukses');
    } else {
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        header('Location: ../user/user.php?status=gagal');
    }

  }else if(isset($_POST['add_st'])){
      // ambil data dari formulir
  $stasiun = $_POST['stasiun'];


    // buat query
    $sql = "INSERT INTO stasiun (stasiun) VALUE ('$stasiun')";
    $query = mysqli_query($db, $sql);

    // apakah query simpan berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman indek.php dengan status=sukses
        header('Location: ../station/stasiun.php?status=sukses');
    } else {
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        header('Location: ../station/stasiun.php?status=gagal');
    }
  }else if(isset($_POST['add_jd'])){
    // ambil data dari formulir
    $nama_kr = $_POST['nama_kr'];
    $asal = $_POST['asal'];
    $tujuan = $_POST['tujuan'];
    $tgl_berangkat = $_POST['tgl_berangkat'];
    $tgl_tiba = $_POST['tgl_tiba'];
    $kelas = $_POST['kelas'];
    $harga = $_POST['harga'];
    $kursi = $_POST['kursi'];

    // buat query
    $sql = "INSERT INTO jadwal (nama_kr, asal, tujuan, tgl_berangkat, tgl_tiba, kelas,harga,kursi) VALUE ('$nama_kr','$asal', '$tujuan', '$tgl_berangkat', '$tgl_tiba', '$kelas',$harga,$kursi)";
    
    $query = mysqli_query($db, $sql);

    // apakah query simpan berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman indek.php dengan status=sukses
        header('Location: ../jadwal/jadwal.php?status=sukses');
    } else {
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        header('Location: jadwal.php?status=gagal');
    }

  }else {
    die("Akses dilarang...");
}

?>