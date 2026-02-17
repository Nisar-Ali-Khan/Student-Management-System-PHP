<?php
$host= "localhost";
$port = 3307; 
$db = "collage"; 
$user = "root"; 
$pass = ""; 

$conn = new PDO("mysql:host=$host;port=$port;dbname=$db", $user, $pass);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



?>