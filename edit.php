<?php
include "config.php"; // Database Connection file
if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$id = $_GET['id'];

$getStmt = $conn->prepare("SELECT * FROM students WHERE ID = :id");
$getStmt->execute([':id' => $id]);
$student = $getStmt->fetch(PDO::FETCH_ASSOC);

if (!$student) {
    die("❌ Error: Student ID in database cannot found !");
}

// 3. UPDATE LOGIC 
if (isset($_POST['update_btn'])) {

    $id = $_POST['id']; 
    $name = $_POST['name'];
    $city = $_POST['city'];
    $course = $_POST['course'];
    $batch = $_POST['batch'];
    $year = $_POST['year'];

    try {
        $sql = "UPDATE students SET 
                    Name = :name, 
                    City = :city, 
                    Course = :course, 
                    Batch = :batch, 
                    Year = :year 
                WHERE ID = :id";

        $updateStmt = $conn->prepare($sql);

        $result = $updateStmt->execute([
            ':name' => $name,
            ':city' => $city,
            ':course' => $course,
            ':batch' => $batch,
            ':year' => $year,
            ':id' => $id
        ]);

        if ($result) {
            echo "<script>
                    alert('✅ Data Successfully Updateed!');
                    window.location.href = 'index.php'; 
                  </script>";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Student</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #eef2f3;
            display: flex;
            justify_content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .form-card {
            background: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        input {
            width: 100%;
            padding: 12px;
            margin: 8px 0;
            border: 1px solid #ddd;
            border-radius: 6px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 12px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 10px;
        }

        button:hover {
            background: #0056b3;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #666;
            text-decoration: none;
        }
    </style>
</head>

<body>

    <div class="form-card">
        <h2>✏️ Edit Record</h2>

        <form action="" method="post">

            <input type="hidden" name="id" value="<?php echo $student['ID']; ?>">

            <label>Name:</label>
            <input type="text" name="name" value="<?php echo $student['Name']; ?>" required>

            <label>Course:</label>
            <input type="text" name="course" value="<?php echo $student['Course']; ?>" required>

            <label>Batch:</label>
            <input type="text" name="batch" value="<?php echo $student['Batch']; ?>" required>

            <label>City:</label>
            <input type="text" name="city" value="<?php echo $student['City']; ?>" required>

            <label>Year:</label>
            <input type="number" name="year" value="<?php echo $student['Year']; ?>" required>

            <button type="submit" name="update_btn">💾 Update Record</button>

            <a href="index.php">Cancel & Go Back</a>
        </form>
    </div>

</body>

</html>