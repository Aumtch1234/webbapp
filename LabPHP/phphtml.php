<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP | Html</title>
</head>
<body>
    <?php 
    $ages = array("Peter" => "35", "Ben" => "37", "Joe" => "40");
    foreach($ages as $x => $val){
    ?>
        <?php echo $x; ?> 
        <?php echo $val; ?> <br>
    <?php
    }
    ?>
</body>
</html>