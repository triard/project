<?php
session_start();
if (empty($_POST['email'])){
echo "
		<script>alert('isi email anda');
		window.location='index.php'
		</script>";
}else{
	echo "
		<script>alert('terimakasih atas partisipasi anda');
		window.location='index.php'
		</script>";
}
?>