<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM vehicles WHERE id='$id'";

    if (mysqli_query($conn, $query)) {
        header("Location: main.php");
        exit;
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
    header("Location: main.php");
    exit;
}
?>
