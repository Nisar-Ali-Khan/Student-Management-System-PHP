<?php
include "config.php"; 

if (isset($_GET['id'])) {
    
    $id = $_GET['id'];

    try {
        $sql = "DELETE FROM students WHERE ID = :id";
        $stmt = $conn->prepare($sql);
        if ($stmt->execute([':id' => $id])) {
            header("Location: view_students.php?msg=deleted");
            exit();
        }

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>