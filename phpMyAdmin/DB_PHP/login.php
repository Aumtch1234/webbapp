<?php
require("connectDB.php");

$email = $_GET["email"];
$password = $_GET["password"];

$sql = "SELECT * FROM employees WHERE email='". $email . "' and password='" . $password . "'";

$result = $conn->query($sql);
if($result->num_rows == 1){
    echo "Login Success <br><br>";
    $row = $result -> fetch_assoc();
    echo $row["firstName"] . " " . $row["lastName"] . " " . $row["email"];
}else{
    echo "<p style='text-align: center;'>Login Fail</p>";
}
?>