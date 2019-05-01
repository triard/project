<?php 
session_start();
include '../config/koneksi.php';
$username = $_POST['username'];
$email = $_POST['username'];
$password = md5($_POST['pass']);
$sql = "SELECT * FROM user WHERE username='$username' or email='$email' and pass='$password'";
$login = mysqli_query($db, $sql);
$cek = mysqli_num_rows($login);
if($cek > 0){

	$data = mysqli_fetch_assoc($login);

	if($data['level']=="admin"){

		$_SESSION['username'] = $username;
		$_SESSION['email'] = $email;
		$_SESSION['level'] = "admin";
		header("location:../admin/dashboard.php");

	}else if($data['level']=="user"){
		$_SESSION['username'] = $username;
		$_SESSION['email'] = $email;
		$_SESSION['level'] = "user";
		header("location:../admin/dashboard.php");

	}else{

		header("location:login.php?pesan=gagal");
	}	
}else{

	header("location:login.php?pesan=gagal");
}
?>