<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto|AntonKaushan+Script|Amaranth|Fredoka+One|Kaushan+Script|Yellowtail" rel="stylesheet">
    <title>Home</title>
</head>

<body>
    <table class="container">
        <tr>
            <td id="home-left">
                <div>
                    <p><i class="fas fa-search    "></i> &nbsp; make it easy on your journey.</p>
                    <p><i class="fas fa-money-bill    "></i> &nbsp; ease of payment.</p>
                    <p> <i class="fas fa-chair    "></i> &nbsp; your comfort is priority.</p>

                </div>
            </td>
            <td id="home-right">
                <div id="home-login">
                    <form action="cek_login.php" method="post">
                        <input type="hidden" name="id" placeholder="Username or email">
                        <input class="home-login-input" type="text" name="username" placeholder="Username or email" required="required">
                        <input class="home-login-input" type="password" name="pass" placeholder="Password" required="required">
                        <input id="home-login-btn" type="submit" value="log in" name="login">
                    </form>
                    <div id="home-content">
                        <h3> <i class="fas fa-train    "></i> let's go!</h3>
                        <h2>make it easy for you.</h2>
                        <p>belum punya akun? <a class="link" href="./registrasi.php"><b>sign up</b></a></p>
                    </div>
                </div>
            </td>
        </tr>
    </table>
</body>
</html>