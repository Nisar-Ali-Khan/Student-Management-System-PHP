<?php
session_start(); 
include "config.php"; 

if (isset($_POST['submit'])) {
    
    $name = $_POST['name'];
    $city = $_POST['city'];
    $course = $_POST['course'];
    $batch = $_POST['batch'];
    $year = $_POST['year'];

    // Empty fields check
    if (empty($name) || empty($city)) {
        $_SESSION['msg'] = "❌ Error: All fields bharna zaroori hai!";
        $_SESSION['msg_type'] = "error";
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

            // --- SUCCES MESSAGE ---
            $_SESSION['msg'] = "✅ Form Submitted Successfully!";
            $_SESSION['msg_type'] = "success";

            header("Location: " . $_SERVER['PHP_SELF']);
            exit();

        } catch (PDOException $e) {
            $_SESSION['msg'] = "❌ Database Error: " . $e->getMessage();
            $_SESSION['msg_type'] = "error";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Form</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background: #eef2f3; display: flex; justify_content: center; align-items: center; height: 100vh; margin: 0; }
        
        .form-card {
            background: white; padding: 40px; width: 100%; max-width: 400px;
            border-radius: 12px; box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        h2 { text-align: center; margin-bottom: 20px; color: #333; }

        /* Input Styling */
        input {
            width: 100%; padding: 12px; margin: 10px 0;
            border: 1px solid #ccc; border-radius: 6px; box-sizing: border-box;
            font-size: 14px;
        }

        /* Button Styling */
        button {
            width: 100%; padding: 12px; background: #28a745; color: white;
            border: none; border-radius: 6px; font-size: 16px; cursor: pointer;
            transition: 0.3s;
        }
        button:hover { background: #218838; }


        button.loading {
            background: #ccc; cursor: not-allowed;
        }

        /* Success/Error Message Box */
        .message-box {
            padding: 15px; margin-bottom: 15px; border-radius: 6px;
            text-align: center; font-weight: bold; display: none; 
        }
        .success { display: block; background: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .error { display: block; background: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }

    </style>
</head>
<body>

    <div class="form-card">
        <h2>📋 Student Form</h2>

        <?php if (isset($_SESSION['msg'])): ?>
            <div class="message-box <?php echo $_SESSION['msg_type']; ?>" id="msgBox">
                <?php 
                    echo $_SESSION['msg']; 
                    unset($_SESSION['msg']); 
                ?>
            </div>
        <?php endif; ?>

        <form action="" method="post" onsubmit="changeButtonText()">
            <input type="text" name="name" placeholder="Full Name" required>
            <input type="text" name="city" placeholder="City" required>
            <input type="text" name="course" placeholder="Course" required>
            <input type="text" name="batch" placeholder="Batch Code" required>
            <input type="number" name="year" placeholder="Year" required>
            
            <button type="submit" name="submit" id="submitBtn">Submit Form</button>
        </form>
    </div>

    <script>
        function changeButtonText() {
            var btn = document.getElementById("submitBtn");
            btn.innerHTML = "Submitting...";
            btn.classList.add("loading");   
        }
        setTimeout(function() {
            var msg = document.getElementById("msgBox");
            if (msg) {
                msg.style.display = "none";
            }
        }, 3000); 
    </script>

</body>
</html>