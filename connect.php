<?php

$host = "localhost";
$username = "root"; 
$password = ""; 



$conn = mysqli_connect($host, $username, $password);


if (!$conn) {
    die("Server Connection Failed: " . mysqli_connect_error());
}
else 
    {
        echo "Connected to server!";
    }
?>
