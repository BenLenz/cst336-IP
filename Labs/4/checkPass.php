<?php

    if(stripos($_GET["user"], $_GET["pass"])!== false)
    {
        echo("Your password contains a part of your username, please try again!");
    }
    else
    {
        echo("Password doesn't contain any part of the username");
    }
?>