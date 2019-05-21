<?php 
session_start();
include '../config/koneksi.php';
$username = $_POST['username'];
$email = $_POST['username'];
$password = md5($_POST['pass']);

$login = mysqli_query($db,"SELECT * FROM user WHERE username='$username' and pass='$password' or email='$email' and pass='$password'");
$cek = mysqli_num_rows($login);

if($cek >0){

	$data = mysqli_fetch_array($login);
	$_SESSION['id']=$data[0];
	 	
	if($data['level']=="admin"){
		
		$_SESSION['username']=$username;
		$_SESSION['email'] = $email;
		$_SESSION['level'] = "admin";
		$_SESSION['id'] = $data[0];
		echo "
		<script>alert('akun admin berhasil masuk')
		window.location='../admin/index.php'
		</script>";
	

		// header("location:../admin/dashboard.php");

	}else if($data['level']=="user"){
		$_SESSION['username'] = $username;
		$_SESSION['email'] = $email;
		$_SESSION['level'] = "user";
		echo "
		<script>alert('anda berhasil masuk')
		window.location='../user/index.php'
		</script>";

		// header("location:../user/index.php");

	}else{
		echo "
		<script>alert('Maaf username/email/password anda salah silahkan untuk mencoba lagi')
		window.location='../login/index.php'
		</script>";
	}

}else{
	echo "
		<script>alert('maaf username/email anda belum terdaftar silahkan untuk mendaftar')
		window.location='../login/index.php'
		</script>";
}
?>