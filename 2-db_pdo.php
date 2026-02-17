<?php
$host = "localhost";
$port = 3307;       
$db   = "collage";     
$user = "root";   
$pass = "";        
$charset = "utf8mb4"; 

$dsn = "mysql:host=$host;port=$port;dbname=$db;charset=$charset";


$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, 
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, 
    PDO::ATTR_EMULATE_PREPARES   => false,                  
];
try {
    $pdo = new PDO($dsn, $user, $pass, $options); 
    
    echo "<h3>PDO Connection Successful! 🎉 (Port $port)</h3>";

} catch (\PDOException $e) { 
    echo "Connection Failed: " . $e->getMessage(); 
}
echo "<pre/>";
$stmt = $pdo->query("SELECT * FROM students");
while ($row = $stmt->fetch()) { 
    print_r($row); 
    echo "<hr/>"; 
}
?>