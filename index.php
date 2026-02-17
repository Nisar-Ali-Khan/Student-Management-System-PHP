<?php
include "config.php"; 

// --- SEARCH LOGIC ---
$search_keyword = ""; 

if (isset($_GET['search'])) {
    $search_keyword = $_GET['search'];
    
    $sql = "SELECT * FROM students WHERE Name LIKE '%$search_keyword%' OR City LIKE '%$search_keyword%'";
    
} else {
    $sql = "SELECT * FROM students";
}
$stmt = $conn->prepare($sql);
$stmt->execute();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student List</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background: #f8f9fa; padding: 30px; }
        
        /* Search Bar Design */
        .search-box {
            margin-bottom: 20px;
            text-align: right;
        }
        .search-box input {
            padding: 10px; width: 250px; border: 1px solid #ccc; border-radius: 4px;
        }
        .search-box button {
            padding: 10px 15px; background: #007bff; color: white; border: none; cursor: pointer; border-radius: 4px;
        }
        .search-box a {
            padding: 10px 15px; background: #6c757d; color: white; text-decoration: none; border-radius: 4px; margin-left: 5px;
        }

        /* Table Design */
        table { width: 100%; border-collapse: collapse; background: white; }
        th, td { padding: 12px; border-bottom: 1px solid #ddd; text-align: left; }
        th { background-color: #343a40; color: white; }
        
        /* Buttons */
        .btn-edit { background: #28a745; color: white; padding: 5px 10px; text-decoration: none; border-radius: 4px; font-size: 14px; }
        .btn-delete { background: #dc3545; color: white; padding: 5px 10px; text-decoration: none; border-radius: 4px; font-size: 14px; margin-left: 5px; }
    </style>
</head>
<body>

    <h2 style="text-align:center;">🎓 Student Management System</h2>

    <div class="search-box">
        <form action="" method="GET">
            <input type="text" name="search" placeholder="Search Name or City..." value="<?php echo $search_keyword; ?>">
            <button type="submit">Search</button>
            <a href="index.php">Reset</a>
        </form>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>City</th>
                <th>Course</th>
                <th>Batch</th>
                <th>Year</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($stmt->rowCount() > 0) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <tr>
                <td><?php echo $row['ID']; ?></td>
                <td><?php echo $row['Name']; ?></td>
                <td><?php echo $row['City']; ?></td>
                <td><?php echo $row['Course']; ?></td>
                <td><?php echo $row['Batch']; ?></td>
                <td><?php echo $row['Year']; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $row['ID']; ?>" class="btn-edit">✏️ Edit</a>
                    <a href="index.php?delete_id=<?php echo $row['ID']; ?>" 
                       class="btn-delete" 
                       onclick="return confirm('Delete ?');">🗑️ Delete</a>
                </td>
            </tr>
            <?php 
                }
            } else {
                echo "<tr><td colspan='7' style='text-align:center; color:red; font-weight:bold;'>❌ No Record Found</td></tr>";
            }
            ?>
        </tbody>
    </table>

</body>
</html>