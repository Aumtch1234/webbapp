<?php
$servername = "localhost";
$username = "demo";
$password = "abc123";
$dbname = "demo";

$conn = new mysqli($servername, $username, $password, $dbname);
if($conn->connect_error){
    die("Connection Fail " .$conn->connect_error); 
}else{
    echo "<p hidden>Connection Success GG </p><br>";
}

?>