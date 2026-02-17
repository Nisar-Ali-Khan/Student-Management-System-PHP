<!-- <?php
include "config.php";
echo "<pre/>";
$getStudents = $conn->prepare("SELECT * FROM students"); 
$getStudents->execute(); 
$getStudents->setFetchMode(PDO::FETCH_ASSOC); 


echo "<table border='1' cellpadding='10'>";
foreach ($getStudents as $student) { 
    echo "<tr>
    <td>" . $student['ID'] . "</td>
    <td>" . $student['Name'] . "</td> 
    <td>" . $student['City'] . "</td> 
    <td>" . $student['Batch'] . "</td> 
    <td>" . $student['Year'] . "</td>
    </tr>";
}
echo "</table>";
?> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student List</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
            background-color: #f4f4f4;
            display: flex;
            justify_content: center;
            padding-top: 50px;
        }
        .styled-table {
            border-collapse: collapse; 
            margin: 25px 0;
            font-size: 0.9em;
            min-width: 600px;
            background-color: #ffffff; 
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15); 
            border-radius: 8px; 
            overflow: hidden;
        }
        .styled-table thead tr {
            background-color: #009879; 
            color: #ffffff; 
            text-align: left;
        }
        .styled-table th,
        .styled-table td {
            padding: 12px 15px; 
        }
        .styled-table tbody tr {
            border-bottom: 1px solid #dddddd;
        }
        .styled-table tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }
        .styled-table tbody tr:last-of-type {
            border-bottom: 2px solid #009879;
        }
        .styled-table tbody tr:hover {
            background-color: #f1f1f1;
            cursor: pointer;
            font-weight: bold;
            color: #009879;
        }
    </style>
</head>
<body>
    <table class="styled-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>City</th>
                <th>Batch</th>
                <th>Year</th>
            </tr>
        </thead>      
        <tbody>
            <?php
            include "config.php"; 

            $getStudents = $conn->prepare("SELECT * FROM students");
            $getStudents->execute();
 
            while ($student = $getStudents->fetch(PDO::FETCH_ASSOC)) {
            ?>
                <tr>
                    <td><?php echo $student['ID']; ?></td>
                    <td><?php echo $student['Name']; ?></td>
                    <td><?php echo $student['City']; ?></td>
                    <td><?php echo $student['Batch']; ?></td>
                    <td><?php echo $student['Year']; ?></td>
                </tr>
            <?php
            } 
            ?>
        </tbody>
    </table>
</body>
</html>