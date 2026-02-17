<?php
include "config.php"; 
$search_keyword = ""; 

if (isset($_GET['search'])) {
    $search_keyword = $_GET['search'];
    $sql = "SELECT * FROM students WHERE Name LIKE '%$search_keyword%' OR City LIKE '%$search_keyword%'";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();

} else {
    $sql = "SELECT * FROM students";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}
?>
