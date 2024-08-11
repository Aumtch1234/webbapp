<?php
require("connectDB.php");

$email = $_GET["email"];
$new_password = $_GET["new_password"];
// Hash the new password
$hashed_password = password_hash($new_password, PASSWORD_BCRYPT);
// Update the password in the database
updatePasswordInDB($conn, $email, $hashed_password);

function updatePasswordInDB($conn, $email, $new_password){
    $db_password = getPasswordFromDB($conn, $email);
    $stmt = $conn->prepare("UPDATE employees SET password = ? WHERE email = ?");
    $stmt->bind_param("ss", $new_password, $email);
    if($stmt->execute()){
        echo "Password updated successfully.<br>";
        echo "Updated user password (hashed): $db_password";
    }
    $stmt->close();
}
function getPasswordFromDB($conn, $email){
    $stmt = $conn->prepare("SELECT password FROM employees WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        return $row['password'];
    } else {
        return null;
    }
}
?>