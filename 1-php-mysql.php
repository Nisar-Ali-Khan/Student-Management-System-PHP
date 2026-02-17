<?php
// $conn = new mysqli("localhost", "root", "", "collage");

// if ($conn->connect_error) {
//     die("Connection Failed: " . $conn->connect_error);
// }

// echo "Connected Successfully";

$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "collage"; 
$port = 3307; 


$conn = mysqli_connect($servername, $username, $password, $dbname, $port);

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}
echo "Connected Successfully on Port 3307!";
echo "<pre/>";
$result = mysqli_query($conn, "SELECT * FROM students");
print_r(mysqli_fetch_all($result, MYSQLI_ASSOC));

?>