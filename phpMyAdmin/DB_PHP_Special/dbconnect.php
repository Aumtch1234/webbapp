<?php
    $server = "localhost";
    $user = "demo";
    $pass = "abc123";
    $db = "demo";

    $conn = new mysqli($server, $user, $pass, $db);
    if($conn -> connect_error){
        die("Fail" . $conn->$connect_error);
    }else{
        echo "OK";
    }
    $conn->set_charset("utf8")
?>