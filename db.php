<?php
$host = "localhost";
$username = "root"; 
$password = ""; 


$conn = mysqli_connect($host, $username, $password);
$sql = "create database vehicle_dealer;";
$result = mysqli_query($conn, $sql);
if($result)
    {
        echo "Database has been created successfully!";
    }
else {
    die("Database creation failed!".mysqli_connect_error());
     }
?>
