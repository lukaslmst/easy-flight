<?php


if(isset($_GET['data'])){

$flightObject = json_decode($_GET['data']);


require("sign-in/db.php");  

$query    = "INSERT INTO `flight`(`location`, `destination`, `date`, `persons`, `price`, `space`, `last_booking_date`, `airline`) 
VALUES ('". $flightObject -> loc ."','".$flightObject -> des."','".$flightObject -> date."','".$flightObject -> persons."','".$flightObject -> totalPrice."','".$flightObject -> space."','".$flightObject -> lastBookingDate."', '".$flightObject -> airline."')";
$result   = mysqli_query($con, $query);


$query_id = "SELECT MAX(flight_id) FROM flight"; 
$result_id   = mysqli_query($con, $query_id);



while($row = $result_id -> fetch_assoc()) {
    $flight_id = $row['MAX(flight_id)'];
}

    
    $username = ($_COOKIE["login"]);

    echo $username;

    $query_flight_user = "INSERT INTO `user_flight`(`username`, `flight_id`) 
    VALUES ('$username','". $flight_id ."')";
    
    $result_flight_user = mysqli_query($con, $query_flight_user);


    
}


?>