<?php 
$db = mysqli_connect("localhost","root","","lets_go");
 
// Check connection
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
 
?>