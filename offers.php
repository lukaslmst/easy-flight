<?php

session_start(); 

if(isset($_COOKIE['login'])){
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
    <link rel="stylesheet" href="css/style-offers.css">
    <script src="js/content.js" defer></script>
    <script src="js/request.js"></script>

</head>
 
<body class="bod">

    <div class="wrapper">

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

        <div class="search-box-offers">

            <div class="flex-form-offers">

                <input id="from" type="search" placeholder="Where are you?" />

                <input id="search" type="search" placeholder="Where do you wanna go?" />

                <input id="date" type="date" name="from" />

                <select name="guests" id="guests">
                    <option value="1">1 guests</option>
                    <option value="2">2 guests</option>
                    <option value="3">3 guests</option>
                    <option value="4">4 guests</option>
                    <option value="5">5 guests</option>
                </select>

                <button onclick="getFlight()">find</button>

            </div>

        </div>

        <div class="content">




        </div>

    </div>




</body>

</html>