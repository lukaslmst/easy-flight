<?php

session_start(); 

if(isset($_COOKIE["login"])){
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
    <link rel="stylesheet" href="css/style_sold.css">
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"> </script>
</head>

<body class="root-elm">

    <div class="wrapper">

        <div class="navbar">

            <div class="logo">
            </div>

            <div class="right-items-nav">
                <p style="text-decoration: none; color:white">Home</p>

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

       

            <h1>successfully orderd your ticket!</h1>



    </div>

</body>

</html>