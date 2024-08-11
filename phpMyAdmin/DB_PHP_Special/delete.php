<?php
    include "dbconnect.php";
    $sql = "DELETE FROM new_productlines WHERE productLine = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $_GET["idx"]);
    $stmt->execute();
    if($stmt->affected_rows > 0){
        header("Location: index.php");
    }else{
        echo "Error deletr";
        exit(0);
    }
?>