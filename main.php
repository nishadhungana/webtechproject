<?php

include 'db.php';

include 'layout.php';


$selectedCategory = isset($_GET['category']) ? $_GET['category'] : '';
$selectedBrand = isset($_GET['brand']) ? $_GET['brand'] : '';
$searchModel = isset($_GET['search']) ? trim($_GET['search']) : '';


$brandQuery = "SELECT DISTINCT brand FROM vehicles ORDER BY brand";
$brandResult = mysqli_query($conn, $brandQuery);
$brands = [];
while ($row = mysqli_fetch_assoc($brandResult)) {
    $brands[] = $row['brand'];
}


$catQuery = "SELECT name FROM categories ORDER BY name";
$catResult = mysqli_query($conn, $catQuery);
$categories = [];
while ($row = mysqli_fetch_assoc($catResult)) {
    $categories[] = $row['name'];
}
?>

<h2>All Vehicles</h2>


<div style="margin-bottom: 20px; padding: 15px; background-color: #f5f5f5; border-radius: 5px;">
    <form method="GET" action="main.php">
        <div style="display: flex; gap: 15px; align-items: center; flex-wrap: wrap;">
            <div style="display: flex; gap: 15px; align-items: center;">
                <div>
                    <label for="category" style="display: block; margin-bottom: 5px; font-weight: bold;">Category:</label>
                    <select id="category" name="category" style="padding: 8px; border: 1px solid #ccc; border-radius: 3px;">
                        <option value="">All Categories</option>
                        <?php foreach ($categories as $cat): ?>
                            <option value="<?php echo $cat; ?>" <?php if ($selectedCategory == $cat) echo 'selected'; ?>>
                                <?php echo $cat; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div>
                    <label for="brand" style="display: block; margin-bottom: 5px; font-weight: bold;">Brand:</label>
                    <select id="brand" name="brand" style="padding: 8px; border: 1px solid #ccc; border-radius: 3px;">
                        <option value="">All Brands</option>
                        <?php foreach ($brands as $brand): ?>
                            <option value="<?php echo $brand; ?>" <?php if ($selectedBrand == $brand) echo 'selected'; ?>>
                                <?php echo $brand; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div style="flex: 1; min-width: 200px;">
                <label for="search" style="display: block; margin-bottom: 5px; font-weight: bold;">Search Model:</label>
                <input type="text" id="search" name="search" placeholder="Search by model..." 
                       value="<?php echo htmlspecialchars($searchModel); ?>" 
                       style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 3px; box-sizing: border-box;">
            </div>

            
            <div>
                <button type="submit" style="padding: 8px 20px; background-color: #007bff; color: white; border: none; border-radius: 3px; cursor: pointer; margin-top: 22px;">
                    Search
                </button>
                <a href="main.php" style="padding: 8px 20px; background-color: #6c757d; color: white; border: none; border-radius: 3px; text-decoration: none; display: inline-block; margin-top: 22px; margin-left: 8px;">
                    Reset
                </a>
            </div>
        </div>
    </form>
</div>

<div class="table-responsive">
<table>
    <tr>
        <th>ID</th>
        <th>Model</th>
        <th>Brand</th>
        <th>Price ($)</th>
        <th>Category</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>

    <?php
    $conditions = [];

    if (!empty($selectedCategory)) {
        $conditions[] = "category='" . mysqli_real_escape_string($conn, $selectedCategory) . "'";
    }

    if (!empty($selectedBrand)) {
        $conditions[] = "brand='" . mysqli_real_escape_string($conn, $selectedBrand) . "'";
    }

    if (!empty($searchModel)) {
        $conditions[] = "model LIKE '%" . mysqli_real_escape_string($conn, $searchModel) . "%'";
    }

    if (!empty($conditions)) {
        $whereClause = "WHERE " . implode(" AND ", $conditions);
    } else {
        $whereClause = "";
    }

    $query = "SELECT * FROM vehicles $whereClause ORDER BY id DESC";
    $result = mysqli_query($conn, $query);

  
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['model'] . "</td>";
            echo "<td>" . $row['brand'] . "</td>";
            echo "<td>" . $row['price'] . "</td>";
            echo "<td>" . $row['category'] . "</td>";
            
            
            echo "<td><a href='vehicle_edit.php?id=" . $row['id'] . "' class='btn btn-edit'>Edit</a></td>";
            
            echo "<td><a href='vehicle_delete.php?id=" . $row['id'] . "' class='btn btn-delete' onclick=\"return confirm('Are you sure you want to delete this vehicle?');\">Delete</a></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='7'>No vehicles found.</td></tr>";
    }
    ?>
</table>
</div>

<?php
include 'footer.php';
?>
