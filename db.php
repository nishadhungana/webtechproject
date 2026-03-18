<?php
// Define database connection variables
$host = "localhost";
$username = "root"; // Default XAMPP/WAMP username, change if different
$password = ""; // Default empty password for XAMPP
$database = "vehicle_dealer";

// Create database connection using mysqli
$conn = mysqli_connect($host, $username, $password, $database);

// Check if connection failed
if (!$conn) {
    die("Database Connection Failed: " . mysqli_connect_error());
}

?>
