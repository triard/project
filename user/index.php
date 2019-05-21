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
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
            integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <script src="../assets/js/jquery-ui-1.12.1/jquery-ui.js"></script>
        <script src="../assets/js/jquery-3.3.1.js"></script>

    </head>

    <body>

        <div class="header">
            <a href="#default" class="logo">let's go!</a>
            <div class="header-right">
                <a class="active" href="#home">Home</a>
                <a href="./trains.php">Trains</a>
                <a href="./cart.php">Confirm</a>
                <a href="./indexKontak.php">Contact</a>
                <a href="./aboutus.php">About</a>
                <a href="../login/index.php">Log out</a>
            </div>
        </div>

        <div class="hero-image">
            <div class="hero-text">
                <h1 style="font-size:55px; font-weight:bold;">Selamat Datang di let's go!</h1>
                <h3>Anda dapat melakukan pemesanan tiket kereta api online dengan mudah</h3>
                <button onclick="window.location.href='./trains.php'"><span>Trains </span></button>
            </div>
        </div>
        <div>

        </div>

        <div class="flex-container">
        <h2>Promo in year <i class="fas fa-smile-beam    "></i></h2>

            <?php 
         require_once('../config/koneksi.php');    
        $query="SELECT * from iklan order by id  desc";
        $result=mysqli_query($db,$query);
        
        $rows=mysqli_num_rows($result);
        // $img=mysqli_fetch_array($result);
        $no=1;
        //proses menampilkan data
        while($rows=mysqli_fetch_array($result)){
        //  for($i=0; $i<$rows; $i++){ ?>

            <a style="margin-left:5%;" onclick="window.location='./detail-promo.php?id=<?php echo $rows['id'] ?>'">
                <div style="flex-grow: 1; margin:5% 7% % 0%;  "> <img style='height:200px; widht:200px;'
                        src="../admin/iklan/img/<?php echo $rows['img']?>" alt="" /></div>
                <!-- <button >detail</button> -->
            </a>
            <?php
         $no++;
        } ?>
        </div>
        <div class="flex-container">
            <h2>Most Train <br><i class="fas fa-train    "></i></h2>
            <?php
                    $sqlBest = mysqli_query($db, "select id_jd, sum(qty) as 'jumlah' from detailtransaksi group by id_jd limit 6");
                    
					while ($rowBest = mysqli_fetch_array($sqlBest)) {
						$sqltrain = mysqli_query($db, "select * from jadwal where id_jd = '$rowBest[0]'");
                        $row = mysqli_fetch_array($sqltrain);                           
            ?>
            
            <div style="flex-grow: 1"><?php echo $row[1]; ?><br>(<?php echo $row[0]; ?>)</div>
                    <?php } ?>
        </div>
        
        <div  class="box-promo">
            <h3 style="color:white;">Why book train tickets with lets_go?</h3>
        <button class="accordion">1. Reliable Booking</button>
        <div class="panel">
                <p></p>Our system is expertly designed to connect directly with PT KAI, so you
                can be sure that your e-ticket will be issued and your seat is secured.
            </p>
        </div>
        <button class="accordion">2. Easy Check-in</button>
        <div class="panel">
             <p>
                Check in and get your official boarding pass from PT KAI simply by scanning
                the barcode in your e-ticket at the station’s self-printing facility.
            </p>
        </div>
        <button class="accordion">3. Best Price</button>
        <div class="panel">
              <p>
                Find the most competitive prices, with special discounts for newsletter
                subscribers and Traveloka members. And not just cheap, it’s honest price.
            </p>
        </div><button class="accordion">4. Most Extensive Search Results</button>
        <div class="panel">
            <p>
                Choose the best train schedule to suit your needs. Here you can find all train
                schedules for the next 90 days, covering all classes from Economy, Business, to Executive.
            </p>
        </div>
        <button class="accordion">5. Secure Online Transaction Guaranteed</button>
        <div class="panel">
            <p>
                
                Security and privacy of your online transaction are protected by RapidSSL authorized technology.
                Receive instant confirmation and e-ticket directly in your email.
            </p>
        </div>
        </div>

        <div class="box-promo">
            <h3 style="color:white;">Tips on Purchasing Train Ticket </h3>
            <p style="color:white;">As one of the major transportations in Indonesia, train is used to facilitate trips and homecoming. It is
                also a reason for increment in number of customers in Indonesia. Nowadays, KAI (Kereta Api Indonesia)
                tickets are easy to get, however customers need to be careful at the time of purchase. Listed below are
                several tips on how to purchase train ticket easily, conveniently and to make your trip comfortable and
                enjoyable.</p>

            <button class="accordion">1. Purchase train ticket online</button>
            <div class="panel">
                <p>Currently, ticket can be purchased at the train station ticket counter only from 9am to 4pm everyday.
                    In addition, the availability of the ticket can only be known once you arrived at the ticket
                    counter. If the worst case happened, you are only wasting time and effort going to travel agent or
                    station without getting any KAI (train) ticket.

                    So, to prevent customer running out of ticket, purchase online is a correct solution. As it can be
                    done anytime, anywhere and guaranteed and easily through laptop or handphone.</p>
            </div>
            <button class="accordion">2. Find KAI ticket promo price on lets_go </button>
            <div class="panel">
                <p>KAI ticket with promo price can be found easily online. Traveloka has officially partnered with PT
                    KAI for online train ticket sales and provide easy online booking through fast and secure process,
                    with various type of payments, and accessible anytime.

                    Moreover, Traveloka allows you to get the cheapest PT KAI ticket price. Therefore, always check the
                    special promotion before purchasing a ticket..</p>
            </div>
            <button class="accordion">3. Book train ticket well ahead</button>
            <div class="panel">
                <p>PT KAI ticket is better booked from a long time before the departure date. Beside to avoid running
                    out of tickets, book the ticket earlier will give you the flexibility to choose schedule as various
                    of time slots available, with many types of class and seat. It also allows you to change the train
                    schedule if needed.

                    Kereta Api Indonesia (KAI) ticket can be booked 90 days before the departure date. To have a ticket
                    as have scheduled, you can use a feature, Train Seat Alert on Traveloka App. You will get a
                    notification if the ticket on your selected schedule is available.</p>
            </div>
            <button class="accordion">4. Select the suitable passenger class</button>
            <div class="panel">
                <p>The difference in the passenger classes are normally in the travel time and facilities given. As the
                    highest class, Kereta Api Indonesia (KAI) Executive class offers the shortest travel time and
                    luxurious facilities. The higher the class, the less number of passengers in one carriage, so you
                    will feel more freely.

                    If convenience is your priority, choosing KAI Executive class ticket is the best choice. However, if
                    you are on a long-haul budget trip, choosing the Business or Economy train classes will be the best
                    option instead.</p>
            </div>
            <button class="accordion">5. Select comfortable seats as needed</button>
            <div class="panel">
                <p>When buying train ticket, you are able to select seat as you want. Based on passengers experience,
                    the most comfortable seat is in the middle of the carriage. It is stable and quiet due to far from
                    carriage connector.

                    Make sure that you select the window seat so that your trip will not feel bored. For day train
                    passengers, check direction of the sun beforehand and select seat opposite to the sun to avoid the
                    heat and sun glare along the trip.</p>
            </div>
            <button class="accordion">6. Consider alternative routes</button>
            <div class="panel">
                <p>Save the cost of train tickets and get more comfort by finding out alternative routes on your way.
                    E.q travel from Jakarta to Surabaya, there are alternative routes such as Gambir Station (GMR) -
                    Pasar Turi Station (SBI), Gambir (GMR) - Surabaya Gubeng (SGU), Pasar Senen (PSE) - Surabaya Pasar
                    Turi (SBI) Pasar Senen (PSE) - Surabaya Gubeng (SGU), and Pasar Senen (PSE) - Wonokromo (W).

                    Gambir Station route is usually quieter and organised than the route from Pasar Senen Station. In
                    choosing a destination station, you may consider a train ticket for closer station to your
                    activities while in that town.</p>
            </div>

        </div>


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
    </body>
    <script>
        var acc = document.getElementsByClassName("accordion");
        var i;

        for (i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function () {
                this.classList.toggle("active");
                var panel = this.nextElementSibling;
                if (panel.style.maxHeight) {
                    panel.style.maxHeight = null;
                } else {
                    panel.style.maxHeight = panel.scrollHeight + "px";
                }
            });
        }
    </script>

</html>