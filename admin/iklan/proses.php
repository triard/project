<?php
include "../../config/koneksi.php";
if(isset($_POST['add'])){
     $id = $_POST['id'];
    $nama = $_POST['nama'];
    $deskripsi = $_POST['descripsi'];
    $uploadedfile = $_FILES['uploadedfile']['name'];
 	$tmp = $_FILES['uploadedfile']['tmp_name'];
 	$fotobaru = date('dmYHis').$uploadedfile; 
 	$path = "./img/".$fotobaru; 

 	if(move_uploaded_file($tmp, $path)) {
 		$sql = "INSERT INTO iklan (nama, img, deskripsi) VALUE ('$nama', '$fotobaru', '$deskripsi')";
        $query = mysqli_query($db, $sql);

 		if ($query) {
             header('Location:./iklan.php?status=sukses');
		}else {
            header('Location:./iklan.php?status=gagal');	
		}
 	}
}
?>