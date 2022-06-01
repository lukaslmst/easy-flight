<?php

session_start();

if (isset($_COOKIE["login"])) {
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
    <link rel="stylesheet" href="css/style-account.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/36753497bd.js" crossorigin="anonymous"></script>
    <script src="js/account.js" defer></script>
    <script src="js/content.js" defer></script>

</head>

<body class="root-elm">

    <div class="wrapper-left">
        <div class="functions">


            <div class="settings">
                <div class="icon"><i class="fa fa-gear"></i></div>
                <p class="name"> Settings </p> <span id="rotate"> > </span>
            </div>


            <div class="my-flights">
                <div class="icon"><i class="fa-solid fa-circle-user"></i></div>
                <p class="name">Account Details </p> <span id="rotate"> > </span>
            </div>


            <div class="support">
                <div class="items-in-button">
                    <div class="icon"><i class="fa-solid fa-envelope"></i></div>
                    <p class="name">Support </p> <span id="rotate"> > </span>
                </div>
            </div>



        </div>


    </div>



    <div class="navbar">


        <div class="name-greet">
            <?php
            echo "Hello, " . $username . "!";
            ?> </div>

        <div class="logo">
        </div>

        <div class="right-items-nav">
            <p style="text-decoration: none; ">Home</p>

            <a href="about.php" style="text-decoration: none;">
                <p>About</p>
            </a>
            <a href="contact.php" style="text-decoration: none; ">
                <p>Contact</p>
            </a>
            <button id="btn"><a style="text-decoration: none; ">Logout</a></button>

        </div>



    </div>


    <div class="saved-flights">
        <div class="content">

            <?php


            require("sign-in/db.php");

            $query    = "SELECT * from flight where flight_id in (SELECT flight_id from user_flight WHERE username = 'oli')";

            $rs   = mysqli_query($con, $query);

            $counter = 0;

            while ($row = $rs->fetch_assoc()) {


                echo '  

            <div class="flight">
    
            <div class="left-info">
        
                <div class="locations">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/82/Lufthansa_Logo_%28Crane%29.svg/1200px-Lufthansa_Logo_%28Crane%29.svg.png" width="12%">
                    <p class="from-location"> ' . $row["location"] . '</p><span class="city-code"> ' . $row["location"] . '</span>
                    <p class="line"> - </p>
                    <p class="to-location">' . $row["destination"] . '</p><span class="city-code">' . $row["destination"] . '</span>
                </div>
                <div class="time">
                    <p>21:30 - 22:40 </p>
                </div>
                  
                <div class="persons">
                    <p class="anz">' . $row["persons"] . 'x</p>
                    <img src="img/pers2.png" class="imgPers"width="7%">
                </div>
        
            </div>
        
            <div class="right-info">
                <input type="date" value="' . $row["date"] . '" class="date">
                <p class="price">ab ' . $row["price"] . ' €</p>
    
                <div class="seats">
                <p>free seats: ' . $row["space"] . ' </p>
            </div>
    
                <button class="btn" id="'.$counter.'" onClick="showOffer('.$counter.')">wählen</button>
        
            </div>
        
        </div>
        ';

                $counter++;
            }



            ?>



        </div>

    </div>




</body>

</html>