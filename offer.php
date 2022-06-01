<?php

session_start();

if (isset($_COOKIE['login'])) {
    $username = ($_COOKIE["login"]);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YourFlight</title>
    <link rel="stylesheet" href="css/style-offer.css">
    <script src="https://kit.fontawesome.com/36753497bd.js" crossorigin="anonymous"></script>

    <script src="js/request.js"></script>
    <script src="js/offer.js" defer></script>
    <script src="js/loggedIn.js"></script>


</head>

<body class="bod">

    <div id="wrapper">
        <div class="navbar">

            <div class="logo">
            </div>

            <div class="right-items-nav">
                <a href="index.php" style="text-decoration: none; color:white">
                    <p>Home</p>
                </a>

                <a href="about.php" style="text-decoration: none; color:white">
                    <p>About</p>
                </a>
                <a href="contact.php" style="text-decoration: none; color:white">
                    <p>Contact</p>
                </a>

                <?php
                if(isset($username)){
                  echo ' <button id="konto"><a href="'.'account.php'.'" style="text-decoration: none; color:white" id="btn"> '.$username.'</a></button> ';

                }
                else{
                    echo ' <button id="konto"><a href="'.'sign-in/registration.php'.'" style="text-decoration: none; color:white" id="btn"> Sign In</a></button> ';

                }

                ?>
            </div>

        </div>



    </div>




</body>

</html>