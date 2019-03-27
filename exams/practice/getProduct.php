<?php
    include 'dbConnection.php';
    $conn = getDatabaseConnection("midtermPractice");
    $sql = "SELECT * FROM mp_product ORDER  BY RAND() LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchALL(PDO::FETCH_ASSOC);
    
    echo json_encode($records);

?>