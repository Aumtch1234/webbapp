<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    include "dbconnect.php";
    $pline = $_POST["proline"];
    $pdesc = $_POST["prodescript"];

    $stmt = $conn->prepare("UPDATE productlines SET textDescription = ? WHERE productLine = ?");
    $stmt->bind_param("ss", $pdesc, $pline);
    $result = $stmt->execute();

    if($stmt->affected_rows == 0){
        echo "No update";
    }else{
        echo "Updated <br><br>";
        echo "<a href='frm_update.php'>Go back</a>";
    }
    $conn->close();
?>  