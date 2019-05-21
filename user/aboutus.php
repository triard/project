<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
         <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <title>Dashboard user</title>
        <style>
            body {
                background-image: url(images/logos.jpg);
                background-size: 100%;
                style="font-family: 'Roboto', sans-serif;
            }
            .flex-container3 {
                display: flex;
                background-color: rgba(0, 0, 0, 0.3);
                font-size: 45px;
                margin-top:13%;
            }

            .flex-container3>p {
                color: white;
                font-family: Calibri;
                font-weight: bold;
                margin-left: 35%;
            }

            .flex-container {
                display: flex;
                background-color: rgba(0, 0, 0, 0.3);
            }

            .flex-container>div {
                margin-left: 5%;
                margin-right: 8%;
                padding: 50px;
                font-size: 40px;
            }

            .flex-container>div>img {
                margin-top: 1%;
                border-radius: 50%;
            }

            .container {
                height: 600px;
                width: 80%;
                background-color: rgba(255, 255, 255, 0.7);
                margin-top: 30px;
                margin-left: 130px;
            }
            .col-md-6 {
                padding: 20px;
            }
            .row {
                width: 90%;
                margin-left: 50px;
            }
            body {
                margin: 0;
                font-family: Arial, Helvetica, sans-serif;
            }
            .header {
                overflow: hidden;
                background-color: rgba(178, 182, 182, 0.3);
                padding: 10px 5px;
                z-index: 6;
            }
            .header a {
                float: left;
                color: white;
                text-align: center;
                padding: 12px;
                text-decoration: none;
                font-size: 18px;
                line-height: 25px;
                border-radius: 4px;
            }
            .header a.logo {
                font-size: 25px;
                font-weight: bold;
            }
            .header a:hover {
                background-color: #ddd;
                color: black;
            }
            .header a.active {
                background-color: dodgerblue;
                color: white;
            }
            .header-right {
                float: right;
            }
            @media screen and (max-width: 500px) {
                .header a {
                    float: none;
                    display: block;
                    text-align: left;
                }
                .header-right {
                    float: none;
                }
            }
            
        </style>
        <script src="../assets/js/jquery-3.3.1.js"></script>
        <link
            href="https://fonts.googleapis.com/css?family=Kaushan+Script|Amaranth|Fredoka+One|Kaushan+Script|Yellowtail"
            rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
            integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    </head>

    <body>
        <div class="header"><a href="#default" class="logo">let's go!</a>
            <div class="header-right"><a href="./index.php">Home</a><a href="./trains.php">Trains</a><a
                    href="./cart.php">Confrim</a><a href="./indexKontak.php">Contact</a><a class="active"
                    href="#about">About</a><a href="../login/index.php">Log out</a></div>
        </div><br>
        <div class="container">
            <div class="row">
                <div class="col-md-12" style="width:90%; ">
                    <center><img src="images/logokai2.png" width="450px"></center>
                </div><br>
                <div class="row" style="background: white; color: black ">
                    <div class="col-md-6">
                        <center>
                            <h2><span style="font-family: 'Roboto', sans-serif; font-size: 40px">ABOUT LETS'GO</span>
                            </h2>
                        </center>
                            <p align="justify">lets_go adalah perusahaan perjalanan daring Indonesia terkemuka
                                yang menyediakan tiket kereta api yang sudah bekerjasama dengan pihak PT. KAI sehingga
                                sudah terjamin keamanannya.</p>
                            <p align="justify">Kami berdiri pada tahun 2019. Awal mula terbentuknya kami karena tugas besar
                                pada mata kuliah Pemrogaman dan Desain WEB pada semester ganjil 2018/1019.  </p>
                    </div>
                </div>
            </div>
            <footer>
                <div class="container3">
                    <div class="row" style="background: rgba(0,0,0,0.3); color: black">
                        <div class="flex-container3">
                            <p>BIODATA KAMI</p>
                        </div>
                    </div>
                </div>
                <div class="container2">
                    <div class="row" style="background: rgba(0,0,0,0.3); color: black">
                        <div class="flex-container">
                            <div><img src="images/tri.jpg" width="300px" height="300px"></div>
                            <div><img src="images/mamang.jpg" width="300px" height="300px"></div>
                        </div>
                    </div>
                </div>
                <div class="container2">
                    <div class="row" style="background: rgba(0,0,0,0.3); color: white; text-align: center">
                        <div class="flex-container">
                            <p style="margin-left: 5%; margin-right: 5%">TRI ARDIANSYAH <br><br>Hai,
                                nama saya Tri,
                                biasa di sapa Pak Tri,
                                saya berkecimpung di dunia IT,
                                terlebih lagi pada bidang backend karena saya suka bermain-main dengan logika.</p>
                            <p style="margin-left: 5%; margin-right: 5%">MUH HAKAM ASH S <br><br>Hai,
                                nama saya Hakam,
                                biasa di sapa Muhhakam,
                                saya berkecimpung di dunia IT,
                                saya tekun pada bidang frontend karena saya suka bermain-main dengan imajinasi.</p>
                            <br><br><br>
                        </div>
                    </div>
                </div>
        </div>
        </footer>
         <div style="background-color: rgba(255,255,255,0.7); padding: 1px; margin-top:60%;">
            <p style="margin-left: 40%; font-family: Calibri; font-weight: bold">Copyright &copy;
                | Designed By @PakTriComp.</p>
        </div>
    </body>

</html>