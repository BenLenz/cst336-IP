<?php
    include 'dbConnection.php';
    $conn = getDatabaseConnection("midtermPractice");
    $sql = "SELECT productId, productName FROM mp_product ORDER BY productName";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchALL(PDO::FETCH_ASSOC);
    
    echo json_encode($records);

?>