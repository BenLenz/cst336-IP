<?php
    include 'connection.php';
    $conn = get_database_connection("scheduler");
    $date = date('Y/m/d');
    $temp = str_replace("/","-", $date);
    $temp = date($temp);
    $sql = "SELECT * FROM event ORDER  BY Starttime";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchALL(PDO::FETCH_ASSOC);
    
    echo json_encode($records);

?> 