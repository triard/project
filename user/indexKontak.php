<?php
require("../login/validasi.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard user</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/style-user.css">
    <script src="../assets/js/jquery-3.3.1.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script|Amaranth|Fredoka+One|Kaushan+Script|Yellowtail" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script src="../assets/js/jquery-3.3.1.js"></script>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
				
        width:70%;
        height: 70%;
        margin:40px;
        margin-left:200px;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
</head>

<body>

    <div class="header">
        <a href="#default" class="logo">let's go!</a>
        <div class="header-right">
            <a href="./index.php">Home</a>
            <a href="./trains.php">Trains</a>
            <a href="./cart.php">Confrim</a>
            <a class="active" href="#Contact">Contact</a>
            <a href="./aboutus.php">About</a>
            <a href="../login/index.php">Log out</a>
        </div>
	</div>
	
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>


	<div class="container-contact100">
		<div class="wrap-contact100">
			<form action="./validasi-email.php" class="contact100-form validate-form" method="POST">
				<span class="contact100-form-title">
					Contact Us
				</span>

				<label class="label-input100" for="message">Pesan *</label>
				<div class="wrap-input100 validate-input"  data-validate = "Message is required">
					<textarea id="message" class="input100" minlength="10" name="message" placeholder="Tulis pesan anda disini"></textarea>
					<span class="focus-input100"></span>
				</div>

				<div class="container-contact100-form-btn">
					<button class="contact100-form-btn">
						Kirim Pesan
					</button>
				</div>
			</form>

			<div class="contact100-more flex-col-c-m" style="background-image: url('images/bg1.jpg');">
				<div class="flex-w size1 p-b-47">
					<div class="txt1 p-r-25">
						<span class="lnr lnr-map-marker"></span>
					</div>

					<div class="flex-col size2">
						<span class="txt1 p-b-20">
							Alamat, klik disini :
						</span>

						<span class="txt2">
							<a style="color: white" href="map.php">Jl. Simbar Menjangan, Kel. Jatimulyo no. 35 RW. 03, Kec. LowokWaru, Kota Malang</a>
						</span>
					</div>
				</div>

				<div class="dis-flex size1 p-b-47">
					<div class="txt1 p-r-25">
						<span class="lnr lnr-phone-handset"></span>
					</div>

					<div class="flex-col size2">
						<span class="txt1 p-b-20">
							Kontak Admin
						</span>

						<span class="txt3">
							081326191370
						</span>
					</div>
				</div>

				<div class="dis-flex size1 p-b-47">
					<div class="txt1 p-r-25">
						<span class="lnr lnr-envelope"></span>
					</div>

					<div class="flex-col size2">
						<span class="txt1 p-b-20">
							Email
						</span>

						<span class="txt3">
							hakam.rpl@gmail.com
						</span>
					</div>
				</div>
			</div>
		</div>
	</div>
	  <div>
	  <table class="box-view"> 
		                    <?php
												
												require_once "../config/koneksi.php";
												$id = $_SESSION['id'];
                        $query = "SELECT * FROM contactus where id_user=$id";
                        
                        if($sql = mysqli_query($db, $query)){
                        while ($r = mysqli_fetch_array($sql)) {
												?>
                        
                         <tr>
                            <th>Nama</th>
                            <th>no.Telp</th>
                            <th>email</th>
                            <th>pesan</th>
                        </tr>
                        <tr>
												    <?php
														$st=mysqli_query($db, "SELECT username from user where id=$r[1]");
                                $nmst = mysqli_fetch_array($st);
                                echo "<td>" . $nmst['username'] . "</td>";
														?>
														<td><?php echo $r[2]; ?></td>
														<td><?php echo $r[3]; ?></td>
														<td><?php echo $r[4]; ?></td>
                        </tr>
												<?php }
												
                      
                }else{
                    echo "
                     <p style='font-size:90px; text-align:center;'><i class='fas fa-exclamation-triangle    '></i></p> <br>
                     <p style='font-size:30px; text-align:center;'> <b>Trains Not Available</b><br>
                     There are no trains matching your search criteria. Please modify your search.</p>";
                }?>
                </table>
		</div>
	  <div id="map"></div>
        <!-- Footer
================================================== -->
        <footer>
            <nav>
                <ul>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms</a></li>
                </ul>
            </nav>
            <p>&copy; 2019. lets.go. All Rights Reserved.</p>
        </footer>



	<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-23581568-13');
	</script>
	<script>

      function initMap() {
        
        // membuat objek untuk titik koordinat
        var malang = {lat: -7.9448136, lng: 112.6167728};
        
        // membuat objek peta
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 18,
          center: malang
        });

        // mebuat konten untuk info window
        var contentString = '<h2>Kantor lets_go<br>Jl. Simbar Menjangan, Kel. Jatimulyo no. 35<br>RW. 03, Kec. LowokWaru, Kota Malang </h2>';

        // membuat objek info window
        var infowindow = new google.maps.InfoWindow({
          content: contentString,
          position: malang
        });
        
        // membuat marker
        var marker = new google.maps.Marker({
          position: malang,
          map: map,
          title: 'Malang'
        });
        
        // event saat marker diklik
        marker.addListener('click', function() {
          // tampilkan info window di atas marker
          infowindow.open(map, marker);
        });
        
      }
    </script>
   <script
      async
      defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAgkbJYLJC5PRu4VjR8Ps1Hv4_NJn5gqWs&callback=initMap"
    ></script>
</body>
</html>
