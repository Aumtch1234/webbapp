<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADD</title>
    <link href="bootstrap-5.0.2-dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php
        if(isset($_POST["register"])){
            include "dbconnect.php";

            $sql = "INSERT INTO new_productlines (productLine, textDescription, htmlDescription, image) VALUE (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt -> bind_param("ssss", $_POST["productline"], $_POST["description"], $_POST["html"], $_POST["image"]);
            $stmt -> execute();
            if($stmt->affected_rows > 0){
                header("Location: index.php");
            }else{
                echo $stmt->affected_rows;
                echo "Register ERROR";
            }
            exit(0);
        }
    ?>
    <div class="container" style="margin-top: 10px;">
        <div class="row">
            <div class="col-12 centerrow">
                <h1>ระบบจัดการข้อมูล Product Lines</h1>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-4">
                <a href="index.php">หน้าหลัก</a>
            </div>
            <div class="container" style="margin-top: 10px;">
                <div class="row">
                    <div class="col-12 centerrow">
                        <div class="card" style="width: 600px;">
                            <div class="card-body">
                                <h3 class="card-title">เพิ่มข้อมูล Product Lines ใหม่</h3><br>

                                <form action="addproductlines.php" method="POST">
                                    <div class="container">
                                        <div class="row" style="margin: 5px;">
                                            <div class="col-3">ProductLine</div>
                                            <div class="col-9">
                                                <input type="text" class="form-control" name="productline">
                                            </div>
                                        </div>
                                        <div class="row" style="margin: 5px;">
                                            <div class="col-3">คำอธิบาย</div>
                                            <div class="col-9">
                                                <input type="text" class="form-control" name="description">
                                            </div>
                                        </div>
                                        <div class="row" style="margin: 5px;">
                                            <div class="col-3">Link HTML</div>
                                            <div class="col-9">
                                                <input type="text" class="form-control" name="html">
                                            </div>
                                        </div>
                                        <div class="row" style="margin: 5px;">
                                            <div class="col-3">รูปภาพ (URL)</div>
                                            <div class="col-9">
                                                <input type="text" class="form-control" name="image">
                                            </div>
                                        </div>
                                        <div class="row" style="margin: 5px;">
                                            <div class="col-9"></div>
                                            <div class="col-3" style="display: flex; justify-content: end;">
                                                <input type="submit" class="btn btn-primary" name="register"
                                                    value="ลงทะเบียน">
                                            </div>
                                        </div>
                                    </div>
                                </form>
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