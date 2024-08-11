<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP | Session</title>
</head>
<body>

    <?php 
    session_start();
    $_SESSION["users"] = "green";
    $_SESSION["pass"] = "dog";
    echo "Session variable are set";
    
    unset($_SESSION["users"]); //เลือกลบ เซสชั่น เจาะจง
    unset($_SESSION["pass"]);
    // session_destroy(); //ลบ เซสชั่น ทั้งหมด
    ?>

</body>
</html>