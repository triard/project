<?php
include("../../config/koneksi.php");

// cek apakah tombol simpan sudah diklik atau blum?
if(isset($_POST['simpan'])){

    // ambil data dari formulir
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];
    $uploadedfile = $_FILES['uploadedfile']['name'];
 	$tmp = $_FILES['uploadedfile']['tmp_name'];
 	$fotobaru = date('dmYHis').$uploadedfile; 
 	$path = "./img/".$fotobaru; 

 	if(move_uploaded_file($tmp, $path)) {
 		$sql = "UPDATE iklan SET nama='$nama', deskripsi='$deskripsi',img='$fotobaru' where id='$id'";
        $query = mysqli_query($db, $sql);

    // apakah query update berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman list-siswa.php
        header('Location: ./iklan.php');
    } else {
        // kalau gagal tampilkan pesan
        die("Gagal menyimpan perubahan...");
    }

} else {
    die("Akses dilarang...");
}
}
?>
