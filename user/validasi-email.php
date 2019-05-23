<?php
session_start();
require_once "../config/koneksi.php";
$idUser = $_SESSION['id'];
$pesan = $_POST['message'];
$sql = mysqli_query($db,"SELECT * FROM user where id=$idUser");
while($row=mysqli_fetch_array($sql)){
   $query=mysqli_query($db,"INSERT INTO contactus (id_user,no_telp,email,pesan) VALUE ('$idUser','$row[4]','$row[5]','$pesan')");
}

// $email = $_POST['idUser'];
if (empty($idUser)){
echo "
		<script>alert('isi pesan anda');
		window.location='indexKontak.php'
		</script>";
}else{
	
	echo "
	    	
		<script>alert(`terimakasih $idUser atas partisipasi anda`);
		window.location='indexKontak.php'
		</script>";
}
?>