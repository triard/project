<?php
session_start();
if (empty($_SESSION['username'])||empty($_SESSION['email'])){
echo "
		<script>alert('anda harus login terlebih dahulu');
		window.location='../login/index.php'
		</script>";
}
?>