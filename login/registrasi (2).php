<html>
  <head>
    <title>registrasi</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Kreon" rel="stylesheet"> 
  </head>
  <body>
<?php
   session_start();
   if(isset($_SESSION['username'])) {
   header('location:login.php'); }
?>
<div align='center'>
  <form action="../login/login-proses.php" method="post">
    <div class="kotak-form">
                    <p><center>FORMULIR PENDAFTARAN</center></p>
                     <input class="input-style" type="text" name="username"  placeholder="Username .." required="required">
                     <input class="input-style" type="text" name="full_name"  placeholder="full name .." required="required">
                     <br>
                     <label style="font-size:20px;">Jenis Kelamin</label> <br>
                     <input type="radio" name="gender" id="rd1" value="Laki-Laki"> <label for="rd1">Laki-Laki</label>
                     <input type="radio" name="gender" id="rd2" value="Perempuan"> <label for="rd2">Perempuan</label>
                    <input class="input-style" type="text" name="kontak" placeholder="no_hp" required="required">  
                    <br>
                     <input class="input-style" type="email" name="email"  placeholder="email .." required="required">
                     <input class="input-style" type="password" name="pass"  placeholder="password .." required="required">
                    <p cosplan="2" align="center"><input value="++add" type="submit" name="daftar" >


    </div>
  </form>
</div>    
  </body>
</html>
