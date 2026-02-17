<?php
include "config.php"; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dynamic Dropdown</title>
    <style>
        body { font-family: sans-serif; padding: 50px; background: #f4f4f4; }
        form { background: white; padding: 30px; max-width: 400px; margin: auto; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        
        label { font-weight: bold; display: block; margin-bottom: 8px; }
        
        /* Dropdown Styling */
        select {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: white;
            cursor: pointer;
        }
        
        button {
            margin-top: 20px; width: 100%; padding: 10px;
            background: #007bff; color: white; border: none; border-radius: 5px; cursor: pointer;
        }
    </style>
</head>
<body>

    <form action="" method="post">
        <h2>🌆 Select Your City</h2>
        
        <label>City Name:</label>
        
        <select name="city" required>
            <option value="">-- Select City --</option>
            
            <?php
            $sql = "SELECT DISTINCT City FROM students ORDER BY City ASC";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            
            $cities = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            if ($stmt->rowCount() > 0) {
                foreach ($cities as $row) {
                    echo '<option value="' . $row['City'] . '">' . $row['City'] . '</option>';
                }
            } else {
                echo '<option value="">No Cities Found</option>';
            }
            ?>
        </select>
        
        <button type="submit" name="submit">Submit</button>
    </form>

    <?php
    if(isset($_POST['submit'])) {
        $selected_city = $_POST['city'];
        echo "<h3 style='text-align:center; color:green;'>You selected: " . $selected_city . "</h3>";
    }
    ?>

</body>
</html>