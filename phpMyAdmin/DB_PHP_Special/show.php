<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SHOW</title>
    <link href="bootstrap-5.0.2-dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php
        include "dbconnect.php";
        if(isset($_GET["idx"])){
            $sql = "SELECT productLine, textDescription, htmlDescription, image FROM new_productlines WHERE productLine = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $_GET["idx"]);
            $stmt->execute();
            $result = $stmt->get_result();
            if($result -> num_rows != 1){
                echo "Error edit";
                exit(0);
            }
            $row = $result->fetch_assoc();
        }
    ?>
    <div class="container" style="margin-top: 10px;">
        <div class="row">
            <div class="col-12">
                <h1>ระบบข้อมูล Product Lines</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <a href="index.php">กลับหน้าแรก</a>
            </div>
        </div>
        <div class="container" style="margin-top: 10px;">
            <div class="row">
                <div class="col-12 centerrow">
                    <div class="card" style="width: 600px;">
                        <div class="card-body">
                            <h3 class="card-title">ข้อมูล Product Lines</h3>
                            <div class="container">
                                <div class="row">
                                    <div class="col-4" style="display: flex; justify: center;">
                                        <img src="<?= $row['image']?>" alt="รูปภาพ" width="200px">
                                    </div>
                                    <div class="col-8">
                                        <div class="row" style="margin: 5px;">
                                            <div class="col-4">ProductLine</div>
                                            <div class="col-8"><?= $row['productLine']?></div>
                                        </div>
                                        <div class="row" style="margin: 5px;">
                                            <div class="col-4">คำอธิบาย</div>
                                            <div class="col-8"><?= $row['textDescription']?></div>
                                        </div>
                                        <div class="row" style="margin: 5px;">
                                            <div class="col-4">Link HTML</div>
                                            <div class="col-8"><?= $row['htmlDescription']?></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12" style="margin-top: 20px; display: flex; justify-content: center;">
                                                <a href="index.php">กลับหน้าหลัก</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>