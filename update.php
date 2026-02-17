<?php
include "config.php"; // Database Connection

$id = $_GET['id']; 
$message = "";

// --- STEP 1: UPDATE LOGIC 
if (isset($_POST['update_btn'])) {
    $name = $_POST['name'];
    $city = $_POST['city'];
    $course = $_POST['course'];
    // $batch = $_POST['batch'];
    // $year = $_POST['year'];
    
    // Update Query
    $sql = "UPDATE students SET Name=:name, City=:city, Course=:course WHERE ID=:id";
    $stmt = $conn->prepare($sql);
    
    if ($stmt->execute([':name'=>$name, ':city'=>$city, ':course'=>$course, ':id'=>$id])) {
        $message = "<div class='alert success'>✅ Data Successfully Updated!</div>";
    } else {
        $message = "<div class='alert error'>❌ Update Failed!</div>";
    }
}

// --- STEP 2: FETCH LOGIC 
$stmt = $conn->prepare("SELECT * FROM students WHERE ID = :id");
$stmt->execute([':id' => $id]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$row) {
    die("❌ Error: Student ID not found!");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Student</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background: #eef2f3; display: flex; justify_content: center; align-items: center; height: 100vh; margin: 0; }
        .form-card { background: white; padding: 40px; border-radius: 12px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); width: 100%; max-width: 400px; }
        h2 { text-align: center; color: #333; margin-bottom: 20px; }
        
        label { font-weight: bold; display: block; margin-top: 10px; }
        input { width: 100%; padding: 10px; margin-top: 5px; border: 1px solid #ccc; border-radius: 6px; box-sizing: border-box; }
        
        button { width: 100%; padding: 12px; margin-top: 20px; background: #007bff; color: white; border: none; border-radius: 6px; font-size: 16px; cursor: pointer; }
        button:hover { background: #0056b3; }
        
        .alert { padding: 10px; margin-bottom: 15px; border-radius: 5px; text-align: center; }
        .success { background: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
    </style>
</head>
<body>

    <div class="form-card">
        <h2>✏️ Edit Student Details</h2>
        <?php echo $message; ?>

        <form action="" method="post">
            <input type="hidden" name="id" value="<?php echo $row['ID']; ?>">

            <label>Full Name</label>
            <input type="text" name="name" value="<?php echo $row['Name']; ?>" required>

            <label>City</label>
            <input type="text" name="city" value="<?php echo $row['City']; ?>" required>

            <label>Batch</label>
            <input type="text" name="course" value="<?php echo $row['Batch']; ?>" required>

            <label>Course</label>
            <input type="text" name="course" value="<?php echo $row['Course']; ?>" required>

            <label>Year</label>
            <input type="text" name="course" value="<?php echo $row['Year']; ?>" required>
            
            <button type="submit" name="update_btn">💾 Update Record</button>
            
            <br><br>
            <a href="index.php" style="text-decoration:none; color:#555; display:block; text-align:center;">← Back to List</a>
        </form>
    </div>

</body>
</html>