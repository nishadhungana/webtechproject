<?php
// Define database connection variables
$host = "localhost";
$username = "root"; // Default XAMPP username
$password = ""; // Default empty password for XAMPP


// Create server connection using mysqli
$conn = mysqli_connect($host, $username, $password);

// Check if connection failed
if (!$conn) {
    die("Server Connection Failed: " . mysqli_connect_error());
}
else 
    {
        echo "Connected to server!";
    }
?>
