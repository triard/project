<!DOCTYPE html>
<html>
<head>
	<title>login</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Kreon" rel="stylesheet"> 
</head>
<body>

	<div class="kotak_login">
		<p class="tulisan_login">Silahkan login</p>
 
		<form action="cek_login.php" method="post">
			<label>Username</label>
			<input type="text" name="username" class="form_login" placeholder="Username .." required="required">
 
			<label>Password</label>
			<input type="password" name="pass" class="form_login" placeholder="Password .." required="required">
 
			<input type="submit" class="tombol_login" value="LOGIN" name="login">
 
			<br/>
			<br/>
			<center>
				<p>belum punya akun?</p>
				<a class="link" href="registrasi.php">registrasi</a>
			</center>
		</form>
		
	</div>
 
 
</body>
</html>