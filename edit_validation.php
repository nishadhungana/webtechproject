<?php
include 'db.php';
include 'layout.php';

if (isset($_POST['update'])) {
    $id = $_POST['id']; // Gets hidden field value
    $model = trim($_POST['model']);
    $brand = trim($_POST['brand']);
    $price = trim($_POST['price']);
    $category = trim($_POST['category']);

    // Validate inputs
    if (empty($model) || empty($brand) || empty($price) || empty($category)) {
        $error = "All fields are required.";
        header("Location: vehicle_edit.php?id=$id&error=" . urlencode($error));
        exit;
    } elseif (!is_numeric($price)) {
        $error = "Price must be a valid number.";
        header("Location: vehicle_edit.php?id=$id&error=" . urlencode($error));
        exit;
    } else {
        // Query to update the specific record using id
        $query = "UPDATE vehicles SET 
                    model='$model', 
                    brand='$brand', 
                    price='$price', 
                    category='$category' 
                  WHERE id='$id'";
        
        // Execute the update
        if (mysqli_query($conn, $query)) {
            echo "<h3>Vehicle updated successfully!</h3>";
            echo "<br><a href='main.php' class='btn btn-primary'>Go to Home</a>";
            include 'footer.php';
            exit; // Stop executing rest of script on success
        } else {
            $error = "Error updating vehicle: " . mysqli_error($conn);
            header("Location: vehicle_edit.php?id=$id&error=" . urlencode($error));
            exit;
        }
    }
}

include 'footer.php';
?>