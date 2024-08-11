<?php
    include "dbconnect.php";

    $sql = "SELECT * FROM products";
    $result = $conn->query($sql);
    $json = array();
    while($row = $result->fetch_assoc()){
        array_push($json, $row);
    }
    echo json_encode($json);
?>