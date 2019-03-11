<?php

    $arr = array("admin", "user", "test");
    //print_r($arr);
    echo '<script>console.log("$arr")</script>';
    if(in_array($_GET["user"], $arr))
    {
        echo("Username already taken, try again!");
    }
    else
    {
        echo("Username is available!");
    }
?>