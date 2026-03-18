<?php

$host = "localhost";
$username = "root"; 
$password = ""; 
$database = "vehicle_dealer";


$conn = mysqli_connect($host, $username, $password, $database);


if (!$conn) {
    die("Database Connection Failed: " . mysqli_connect_error());
}

?>
