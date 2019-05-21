<html>
<head>
  <title>registrasi</title>
  <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Kreon" rel="stylesheet">
  <style>
    body {
      background-image: url(../assets/icon/register.jpg);
      background-size: 100%;
    }
  </style>
</head>
<body>
  <div style="margin-left:32%;">
    <form action="../login/login-proses.php" method="post">
      <div class="kotak" style="margin-top:3%; height:87%; margin-left:2%; background-color:rgba(225,225,225,0.8);" align="center">
        <h1>
          <center>ayo daftar untuk mendapatkan kemudahan dalam perjalanan anda</center>
        </h1>
        <input class="form_login" type="text" name="username" placeholder="Username .." required="required">
        <br><input class="form_login" type="text" name="full_name" placeholder="full name .." required="required">
        <br><label style="font-size:90%px;">Jenis Kelamin</label> <br>
        <input type="radio" name="gender" id="rd1" value="Laki-Laki"> <label for="rd1">Laki-Laki</label>
        <input type="radio" name="gender" id="rd2" value="Perempuan"> <label for="rd2">Perempuan</label>
        <br><br><input class="form_login" type="text" name="kontak" placeholder="no_hp" required="required">
        <br><input class="form_login" type="email" name="email" placeholder="email .." required="required">
        <br><input class="form_login" type="password" name="pass" placeholder="password .." required="required">
        <br><input class="btn-submit" value="sign up" type="submit" name="daftar">
        <a class="btn-submit" href="./index.php" style="background-color:#f44336;">Back</a>
      </div>
    </form>
  </div>
</body>
</html>