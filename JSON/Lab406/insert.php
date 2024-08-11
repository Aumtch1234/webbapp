<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    include "dbconnect.php";
    $pline = $_POST["proline"];
    $pdesc = $_POST["prodescript"];

    $sql = "INSERT INTO productlines(productLine, textDescription) VALUE (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $pline, $pdesc);
    $result = $stmt->execute();

    if($result == true){
        echo "New record created successfully<br><br>";
        echo "<a href='frm_insert.php'>Go back</a>";
    }else{
        echo "ERROR:". $sql. "<br>". $conn->error;
    }
    $conn->close();
?>  