<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <link rel="stylesheet" href="../assets/css/style-user.css">
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
                <a href="#home">Home</a>
                <a href="./trains.php">Trains</a>
                <a href="#">My trips</a>
                <a href="./indexKontak.php">Contact</a>
                <a href="./aboutus.php">About</a>
                <a href="../login/index.php">Log out</a>
            </div>
        </div>
    <!-- elemen untuk menampilkan peta -->
    <div id="map"></div>
    <div class="action">
            <h2>Give it a try before you commit.</h2>
            <p>You will get various attractive promos from our website. Just give us your email address, and
                we'll send you the details:</p>
            <form action="./validasi-email.php" method="POST">
                <center><input type="email" name="email" placeholder="Enter your email address" required="required" />
                    <button type="submit" name="email-home">Sign Up Now! <i class="fas fa-plane    "></i></button>
                </center>
            </form>
        </div>
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
    
    <script>

      function initMap() {
        
        // membuat objek untuk titik koordinat
        var malang = {lat: -7.9448136, lng: 112.6167728};
        
        // membuat objek peta
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 17,
          center: malang
        });

        // mebuat konten untuk info window
        var contentString = '<h2>Ini kantor kita</h2>';

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