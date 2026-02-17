<!-- <form action="" method="post">
    <input type="text" placeholder="Enter Name" name="name">
    <br />
    <br />
    <input type="text" placeholder="Enter City" name="city">
    <br />
    <br />
    <input type="text" placeholder="Enter Course" name="course">
    <br />
    <br />
    <input type="text" placeholder="Enter Batch" name="batch">
    <br />
    <br />
    <input type="number" placeholder="Enter Year" name="year">
    <br />
    <br />

    <button type="submit" name="submit">Insert Student</button>


</form>

<?php
include "config.php"; 

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    
    $name = $_POST['name'];
    $city = $_POST['city'];
    $course = $_POST['course'];
    $batch = $_POST['batch'];
    $year = $_POST['year'];

    if (empty($name) || empty($city)) {
        echo "<script>alert('❌ Fields Empty!');</script>";
    } else {
        try {
            $sql = "INSERT INTO students (Name, City, Course, Batch, Year) VALUES (:name, :city, :course, :batch, :year)";
            $stmt = $conn->prepare($sql);
            
            $stmt->execute([
                ':name' => $name,
                ':city' => $city,
                ':course' => $course,
                ':batch' => $batch,
                ':year' => $year
            ]);

            echo "<script>
                    alert('✅ Student Successfully Added!');
                    window.location.href = 'add_student.php'; 
                  </script>";
            exit(); 

        } catch (PDOException $e) {
            echo "<script>alert('❌ Error: " . $e->getMessage() . "');</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
    <style>
        body { font-family: sans-serif; background-color: #f4f4f4; display: flex; justify_content: center; align-items: center; height: 100vh; margin: 0; }
        .form-box { background: white; padding: 30px; border-radius: 10px; box-shadow: 0 0 15px rgba(0,0,0,0.1); width: 350px; }
        input { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ccc; border-radius: 5px; box-sizing: border-box; }
        button { width: 100%; padding: 10px; background: #28a745; color: white; border: none; border-radius: 5px; cursor: pointer; font-size: 16px; }
        button:hover { background: #218838; }
        h2 { text-align: center; margin-bottom: 20px; }
    </style>
</head>
<body>

    <div class="form-box">
        <h2>🎓 New Admission</h2>
        <form action="" method="post">
            <input type="text" name="name" placeholder="Full Name" required>
            <input type="text" name="city" placeholder="City" required>
            <input type="text" name="course" placeholder="Course" required>
            <input type="text" name="batch" placeholder="Batch" required>
            <input type="number" name="year" placeholder="Year" required>
            <button type="submit" name="submit">Save Student</button>
        </form>
    </div>

</body>
</html>

