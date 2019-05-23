<?php
require_once "../../config/koneksi.php";
$idUser =$_GET['idUser'];
$id=$_GET['id'];
$query = "UPDATE contactus SET status='Read' WHERE id=$id and id_user=$idUser";
 $sql = mysqli_query($db, $query);
	echo "
		<script>alert(`pesan telah terbaca`);
		window.location='index.php'
		</script>";
?>