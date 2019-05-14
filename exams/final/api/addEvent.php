<?php
    include 'connection.php';
    $conn = get_database_connection("scheduler");
    echo($_POST['date']);
    $sql = "INSERT INTO event(Date, Starttime, Endttime, Bookedby, Id) " .
               "VALUES (:date, :start, :end, :booked, :id) ";
    $stmt = $conn->prepare($sql);
    $stmt->execute(array (":date" => $_GET['date'],
                              ":start" => $_GET['start'],
                              ":end" => $_GET['end'],
                              ":booked" => $_GET['booked'],
                              ":id" => NULL));

    
     echo json_encode(array("success" => true));
1
?>