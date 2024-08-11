<?php
require("connectDB.php");

$email = $_GET["email"];
$password = $_GET["password"];

$db_password = getPasswordFromDB($conn, $email);
if(password_verify($password, $db_password)){
    header("Location: index.html?LoginResult=OK");
}else{
    header("Location: index.html?LoginResult=FAILED");
}

function getPasswordFromDB($conn, $email){
    $stmt = $conn -> prepare("SELECT password FROM employees WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result -> num_rows == 1){
        $row = $result -> fetch_assoc();
        return $row["password"];
    }else{
        return "WTF!! Pssword worng ";
    }
}
?>