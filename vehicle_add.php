<?php
include 'db.php';
include 'layout.php';

if (isset($_POST['submit'])) {
    
    $model = trim($_POST['model']);
    $brand = trim($_POST['brand']);
    $price = trim($_POST['price']);
    $category = trim($_POST['category']);

    $error = "";

    if (empty($model) || empty($brand) || empty($price) || empty($category)) {
        $error = "All fields are required.";
    } 
   
    elseif (!is_numeric($price)) {
        $error = "Price must be a valid number.";
    } 
    else {
        $query = "INSERT INTO vehicles (model, brand, price, category) 
                  VALUES ('$model', '$brand', '$price', '$category')";
        
        if (mysqli_query($conn, $query)) {
            echo "<h3>Vehicle added successfully!</h3>";
            echo "<br><a href='main.php' class='btn btn-primary'>Go to Home</a>";
        } else {
            $error = "Error adding vehicle: " . mysqli_error($conn);
        }
    }

    if (!empty($error)) {
        echo "<p class='error'>$error</p>";
        echo "<a href='vehicle_form.php' class='btn btn-primary'>Go Back</a>";
    }
}

include 'footer.php';
?>
