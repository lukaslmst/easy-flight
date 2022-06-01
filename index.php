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
    <link rel="stylesheet" href="css/style.css">
    <script src="js/app.js" defer></script>
    <script src="js/request.js"></script>
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

        <div class="animated-text">

            <div id="container">
                <span id="text1"></span>
                <span id="text2"></span>
                <span id="text3"><span style="color: #4CA5FF;">Ad</span>venture<span style="color: #4CA5FF;">.</span></span>
            </div>

            <svg id="filters">
                <defs>
                    <filter id="threshold">
                        <feColorMatrix in="SourceGraphic" type="matrix" values="1 0 0 0 0
                                            0 1 0 0 0   
                                            0 0 1 0 0
                                            0 0 0 255 -140" />
                    </filter>
                </defs>
            </svg>
        </div>


        <div class="search-box">

            <div class="flex-form">

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




    </div>

</body>

</html>