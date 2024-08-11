<?php
require("connectDB.php");

$email = $_GET["email"];
$password = $_GET["password"];

$stmt = $conn->prepare("SELECT * FROM employees ".
                        "where email=? and password=?");
$stmt->bind_param("ss", $email, $password);
$stmt->execute();
$result = $stmt->get_result();
if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        echo $row["firstName"] . " " . $row["lastName"] . "<br>";
    }
}else{
    echo "No row";
}
$conn->close();
?>