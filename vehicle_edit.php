<?php
include 'db.php';
include 'layout.php';

$id = "";
$model = "";
$brand = "";
$price = "";
$category = "";
$error = "";


if (isset($_GET['error'])) {
    $error = $_GET['error'];
}


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    
    $query = "SELECT * FROM vehicles WHERE id='$id'";
    $result = mysqli_query($conn, $query);

   
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $model = $row['model'];
        $brand = $row['brand'];
        $price = $row['price'];
        $category = $row['category'];
    } else {
        echo "<p class='error'>Vehicle not found!</p>";
        include 'footer.php';
        exit;
    }
} else {
    
    header("Location: main.php");
    exit;
}
?>

<h2>Edit Vehicle</h2>

<?php if (!empty($error)) echo "<p class='error'>" . htmlspecialchars($error) . "</p>"; ?>


<form action="edit_validation.php" method="POST">
    
    <input type="hidden" name="id" value="<?php echo $id; ?>">

   <label>Category:</label>
    <select name="category" required>
        <?php
        
        $catQuery = "SELECT name FROM categories ORDER BY name";
        $catResult = mysqli_query($conn, $catQuery);
        while ($row = mysqli_fetch_assoc($catResult)) {
            $catName = $row['name'];
            $selected = ($category == $catName) ? 'selected' : '';
            echo "<option value=\"$catName\" $selected>$catName</option>";
        }
        ?>
    </select>

    <label>Brand:</label>
    <input type="text" name="brand" value="<?php echo $brand; ?>" required>
   
    <label>Model:</label>
    <input type="text" name="model" value="<?php echo $model; ?>" required>
    
    <label>Price:</label>
    <input type="number" name="price" value="<?php echo $price; ?>" required>


    <button type="submit" name="update" class="btn btn-primary">Update Vehicle</button>
</form>

<?php include 'footer.php'; ?>
