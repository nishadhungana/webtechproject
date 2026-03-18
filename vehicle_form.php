<?php
include 'layout.php';
include 'db.php';

$catQuery = "SELECT name FROM categories ORDER BY name";
$catResult = mysqli_query($conn, $catQuery);
$categories = [];
while ($row = mysqli_fetch_assoc($catResult)) {
    $categories[] = $row['name'];
}
?>

<h2>Add New Vehicle</h2>

<form action="vehicle_add.php" method="POST">
    <label>Category:</label>
    <select name="category" required>
        <option value="">Select Category</option>
        <?php foreach ($categories as $cat): ?>
            <option value="<?php echo $cat; ?>"><?php echo $cat; ?></option>
        <?php endforeach; ?>
    </select>

    <label>Brand:</label>
    <input type="text" name="brand" required>

    <label>Model:</label>
    <input type="text" name="model" required>

    <label>Price:</label>
    <input type="number" name="price" required>

    

    <button type="submit" name="submit" class="btn btn-primary">Save Vehicle</button>
</form>

<?php include 'footer.php'; ?>
