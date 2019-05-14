<?php
session_start();
include 'connection.php';


  $httpMethod = strtoupper($_SERVER['REQUEST_METHOD']);

  switch($httpMethod) {
    case "OPTIONS":
      // Allows anyone to hit your API, not just this c9 domain
      header("Access-Control-Allow-Headers: X-ACCESS_TOKEN, Access-Control-Allow-Origin, Authorization, Origin, X-Requested-With, Content-Type, Content-Range, Content-Disposition, Content-Description");
      header("Access-Control-Allow-Methods: POST, GET");
      header("Access-Control-Max-Age: 3600");
      exit();
    case "GET":
      // TODO: Access-Control-Allow-Origin
      http_response_code(401);
      echo "Not Supported";
      break;
    case 'POST':
      // Allow any client to access
      header("Access-Control-Allow-Origin: *");
      // Let the client know the format of the data being returned
      header("Content-Type: application/json");

      // Get the body json that was sent
      $rawJsonString = file_get_contents("php://input");

      //var_dump($rawJsonString);

      // Make it a associative array (true, second param)
      $jsonData = json_decode($rawJsonString, true);

      
      // TODO: do stuff to get the $results which is an associative array
     
      // Get Data from DB
      try {
        echo "test";
        echo $_POST["email"];
        $dbConn = get_database_connection();
        $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        
        $stmt = $dbConn->prepare("SELECT * FROM user WHERE Email=:email");
        $stmt->execute(array(':email' => $_POST["email"]));
        $check_user = $stmt->fetchAll(PDO::FETCH_ASSOC);

    	if(!$check_user)
        {
        //new user - we need to insert a record
        $sql = "INSERT INTO user(Id, Name, Email) " .
               "VALUES (:id, :name, :email) ";
        $stmt = $dbConn->prepare($sql);
        $stmt->execute(array (":id" => NULL,
                              ":name" => $_POST["name"],
                              ":email" => $_POST["email"]));
        $_SESSION['signedIn'] = true;
        // Sending back down as JSON
        echo json_encode(array("success" => true));
        }
        else {
            echo "email already in use";
            echo json_encode(array("success" => true));
        }
  
        } catch (PDOException $ex) {
            echo "made it to catch";
        switch ($ex->getCode()) {
          case "23000":
            echo json_encode(array(
              "success" => false, 
              "message"=> "email taken, try another",
              "details" => $ex->getMessage()));
            break;
          default:
            echo json_encode(array(
              "success" => false, 
              "message"=> $ex->getMessage(),
              "details" => $ex->getMessage()));
            break;
        }
        }
      break;
    case 'PUT':
      // TODO: Access-Control-Allow-Origin
      http_response_code(401);
      echo "Not Supported";
      break;
    case 'DELETE':
      // TODO: Access-Control-Allow-Origin
      http_response_code(401);
      break;
  }
?>