<?php
    include 'dbConnection.php';
    $conn = getDatabaseConnection("cinder");
    $sql = "SELECT * FROM user WHERE 1 AND username LIKE :userName";
    $namedParameters = array();
    $namedParameters[":userName"] ="%". $_GET['username']."%";
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParameters);
    $records = $stmt->fetchALL(PDO::FETCH_ASSOC);
    
    echo json_encode($records);

?>