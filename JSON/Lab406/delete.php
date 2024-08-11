<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    include "dbconnect.php";
    $pline = $_POST["proline"];
    // $pdesc = $_POST["prodescript"];

    $stmt = $conn->prepare("DELETE FROM productlines WHERE productLine = ?");
    $stmt->bind_param("s", $pline);
    $result = $stmt->execute();

    if($stmt->affected_rows == 0){
        echo "No record to be deleted";
    }else{
        echo "Delete sucessfully <br><br>";
        echo "<a href='frm_update.php'>Go back</a>";
    }
    $conn->close();
?>  