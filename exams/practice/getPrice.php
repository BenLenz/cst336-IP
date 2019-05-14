<?php
    include 'dbConnection.php';
    $conn = getDatabaseConnection("midtermPractice");
    $sql = "SELECT * FROM mp_product WHERE 1 AND productName LIKE :productName";
    $namedParameters = array();
    $namedParameters[":productName"] ="%". $_GET['product']."%";
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParameters);
    $records = $stmt->fetchALL(PDO::FETCH_ASSOC);
    
    echo json_encode($records);

?>