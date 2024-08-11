<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDIT</title>
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
            if($result->num_rows != 1){
                echo "Error edit";
                exit(0);
            }
            $row = $result->fetch_assoc();
        }
        elseif(isset($_POST["edit"])){
            $sql = "UPDATE new_productlines SET textDescription=?, htmlDescription=?, image=? WHERE productLine=?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssss", $_POST["description"], $_POST["html"], $_POST["image"], $_POST["productline"]);
            $stmt->execute();
            if($stmt->affected_rows > 0){
                header("Location: index.php");
            }else{
                echo "Error edit";
                exit(0);
            }
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
                                <h3 class="card-title">แก้ไขข้อมูล Product Lines</h3><br>

                                <form action="edit.php" method="POST">
                                    <input type="hidden" class="form-control" name="productline1" value="<?= $row["productLine"]?>">
                                    <div class="container">
                                        <div class="row" style="margin: 5px;">
                                            <div class="col-3">ProductLine</div>
                                            <div class="col-9">
                                                <input type="text" class="form-control" name="productline" value="<?= $row["productLine"] ?>">
                                            </div>
                                        </div>
                                        <div class="row" style="margin: 5px;">
                                            <div class="col-3">คำอธิบาย</div>
                                            <div class="col-9">
                                                <input type="text" class="form-control" name="description"  value="<?= $row["textDescription"] ?>">
                                            </div>
                                        </div>
                                        <div class="row" style="margin: 5px;">
                                            <div class="col-3">Link HTML</div>
                                            <div class="col-9">
                                                <textarea type="text" class="form-control" name="html" rows="5"><?= $row["htmlDescription"]?></textarea>
                                            </div>
                                        </div>
                                        <div class="row" style="margin: 5px;">
                                            <div class="col-3">รูปภาพ (URL)</div>
                                            <div class="col-9">
                                                <textarea type="text" class="form-control" name="image" rows="5"><?= $row["image"]?></textarea>
                                            </div>
                                        </div>
                                        <div class="row" style="margin: 5px;">
                                            <div class="col-9"></div>
                                            <div class="col-3" style="display: flex; justify-content: end;">
                                                <input type="submit" class="btn btn-primary" name="edit"
                                                    value="บันทึกการแก้ไข">
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