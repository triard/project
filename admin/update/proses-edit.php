<?php
include("../../config/koneksi.php");

// cek apakah tombol simpan sudah diklik atau blum?
if(isset($_POST['simpan'])){

    // ambil data dari formulir
    $id = $_POST['id'];
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $gender = $_POST['gender'];
    $kontak = $_POST['kontak'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $level = $_POST['level'];

    // buat query update
    $sql = "UPDATE user SET full_name='$full_name', username='$username', gender='$gender', kontak='$kontak', email='$email',pass='$pass',level='$level' WHERE id='$id';";
    
    $query = mysqli_query($db, $sql);


    // apakah query update berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman list-siswa.php
        header('Location: ../user/user.php');
    } else {
        // kalau gagal tampilkan pesan
        die("Gagal menyimpan perubahan...");
    }


}else if(isset($_POST['simpan-stasiun'])){
     // ambil data dari formulir
    $id_st = $_POST['id_st'];
    $stasiun = $_POST['stasiun'];

    // buat query update
    $sql = "UPDATE stasiun SET  stasiun='$stasiun' WHERE id_st=$id_st";
    $query = mysqli_query($db, $sql);

    // apakah query update berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman stasiun.php
        header('Location: ../station/stasiun.php');
    } else {
        // kalau gagal tampilkan pesan
        die("Gagal menyimpan perubahan...");
    }

}if(isset($_POST['simpan-jadwal'])){

    // ambil data dari formulir
    $id_jd = $_POST['id_jd'];
    $nama_kr = $_POST['nama_kr'];
    $asal = $_POST['asal'];
    $tujuan = $_POST['tujuan'];
    $tgl_berangkat = $_POST['tgl_berangkat'];
    $tgl_tiba = $_POST['tgl_tiba'];
    $kelas = $_POST['kelas'];
    $status = $_POST['status'];

    // buat query update
    $sql = "UPDATE jadwal SET nama_kr='$nama_kr', asal='$asal', tujuan='$tujuan', tgl_berangkat='$tgl_berangkat', tgl_tiba='$tgl_tiba', kelas='$kelas', status='$status' WHERE id_jd=$id_jd";
    $query = mysqli_query($db, $sql);

    // apakah query update berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman list-siswa.php
        header('Location: ../jadwal/jadwal.php');
    } else {
        // kalau gagal tampilkan pesan
        die("Gagal menyimpan perubahan...");
    }


}
 else {
    die("Akses dilarang...");
}

?>
