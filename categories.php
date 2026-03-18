<?php
include 'db.php';
include 'layout.php';

$error = "";
$success = "";


if (isset($_GET['delete'])) {
    $catName = mysqli_real_escape_string($conn, $_GET['delete']);
    $deleteQuery = "DELETE FROM categories WHERE name='$catName'";
    
    if (mysqli_query($conn, $deleteQuery)) {
        $success = "Category deleted successfully!";
    } else {
        $error = "Error deleting category: " . mysqli_error($conn);
    }
}

if (isset($_POST['add_category'])) {
    $categoryName = trim($_POST['category_name']);
    if (empty($categoryName)) {
        $error = "Category name cannot be empty.";
    } else {
        $categoryName = mysqli_real_escape_string($conn, $categoryName);
        $addQuery = "INSERT INTO categories (name) VALUES ('$categoryName')";
        if (mysqli_query($conn, $addQuery)) {
            $success = "Category added successfully!";
        } else {
            $error = "Error adding category: " . mysqli_error($conn);
        }
    }
}


$query = "SELECT * FROM categories ORDER BY name";
$result = mysqli_query($conn, $query);
?>

<h2>Manage Categories</h2>

<?php if (!empty($error)): ?>
    <p style="color: red; font-weight: bold;"><?php echo $error; ?></p>
<?php endif; ?>

<?php if (!empty($success)): ?>
    <p style="color: green; font-weight: bold;"><?php echo $success; ?></p>
<?php endif; ?>


<div style="margin-bottom: 30px; padding: 15px; background-color: #f5f5f5; border-radius: 5px;">
    <h3>Add New Category</h3>
    <form method="POST" action="categories.php">
        <div style="display: flex; gap: 10px; align-items: flex-end;">
            <div>
                <label for="category_name" style="display: block; margin-bottom: 5px; font-weight: bold;">Category Name:</label>
                <input type="text" id="category_name" name="category_name" placeholder="Enter category name" 
                       style="padding: 8px; border: 1px solid #ccc; border-radius: 3px;" required>
            <button type="submit" name="add_category" style="padding: 8px 20px; background-color: #28a745; color: white; border: none; border-radius: 3px; cursor: pointer;">
                Add Category
            </button>
                    </div>
        </div>
    </form>
</div>


<div>
    <h3>Existing Categories</h3>
    
    <?php if (mysqli_num_rows($result) > 0): ?>
        <div class="table-responsive">
            <table>
                <tr>
                    <th>ID</th>
                    <th>Category Name</th>
                    <th>Created Date</th>
                    <th>Action</th>
                </tr>
                
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['created_at']; ?></td>
                        <td>
                            <a href="categories.php?delete=<?php echo urlencode($row['name']); ?>" 
                               class="btn btn-delete" 
                               onclick="return confirm('Are you sure you want to delete this category?');">
                                Delete
                            </a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </table>
        </div>
    <?php else: ?>
        <p><strong>No categories found. Add one to get started!</strong></p>
    <?php endif; ?>
</div>

<?php include 'footer.php'; ?>
