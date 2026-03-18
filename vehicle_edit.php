<?php
include 'db.php';
include 'layout.php';

$id = "";
$model = "";
$brand = "";
$price = "";
$category = "";
$error = "";

// Check for error message from redirect
if (isset($_GET['error'])) {
    $error = $_GET['error'];
}

// STEP 2: Fetch existing data to display inside the edit form
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Fetch individual data using passed id
    $query = "SELECT * FROM vehicles WHERE id='$id'";
    $result = mysqli_query($conn, $query);

    // If matching vehicle found, pre-fill variables
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
    // Prevent direct access to page without id parameter
    header("Location: main.php");
    exit;
}
?>

<h2>Edit Vehicle</h2>

<?php if (!empty($error)) echo "<p class='error'>" . htmlspecialchars($error) . "</p>"; ?>

<!-- Form submits to itself using POST -->
<form action="edit_validation.php" method="POST">
    <!-- Hidden input to pass ID during update operation -->
    <input type="hidden" name="id" value="<?php echo $id; ?>">

   <label>Category:</label>
    <select name="category" required>
        <?php
        // Fetch categories from database
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
