<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page 1 Main | PHP Special</title>
    <link href="bootstrap-5.0.2-dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php
    include "dbconnect.php";
    if(isset($_GET["keyword"])){
        $keyword = "%" . $_GET["keyword"] . "%";
        $sql = "SELECT * FROM new_productlines WHERE productline LIKE ? OR textDescription LIKE ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $keyword, $keyword);
        $stmt->execute();
        $result = $stmt->get_result();
    }else{
        $sql = "SELECT * FROM new_productlines";
        $result = $conn->query($sql);
    }
    ?>

    <div class="container" style="margin-top: 10px;">
        <div class="row">
            <div class="col-12">
                <h1>ระบบจัดการข้อมูล Product Lines</h1>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-4">
                <a href="index.php">หน้าหลัก</a>&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="addproductlines.php">เพิ่ม Product Lines</a>
            </div>
            <div class="col-4">
                <form action="">
                    <div class="input-group mb-3">
                        <input type="text" name="keyword" class="form-control" placeholder="ค้นหาจากชื่อ คำอธิบาย">
                        <button class="btn btn-primary" type="submit" id="button-addon2">ค้นหา</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="card bg-primary" style="margin: 5px;">
            <div class="row">
                <div class="col-1 centerrow">
                    ลำดับที่
                </div>
                <div class="col-2 centerrow">
                    รูปภาพ
                </div>
                <div class="col-3 centerrow">
                    ชื่อ Productline
                </div>
                <div class="col-4 centerrow">
                    คำอธิบาย
                </div>
                <div class="col-2 centerrow">
                    จัดการข้อมูล
                </div>
            </div>

        </div>

        <div class="card r" style="margin: 5px;">
            <?php
            $idx = 1;
            while($row = $result->fetch_assoc()){
        ?>
            <div class="row" style="margin-top: 5px; margin-bottom: 5px; cursor: pionter;">
                <div class="col-1 centerrow" onclick="location.href='show.php?idx=<?= $row['productLine'] ?>';"
                    style="cursor: pointer;"><?= $idx++ ?></div>
                <div class="col-2 centerrow" onclick="location.href='show.php?idx=<?= $row['productLine'] ?>';"
                    style="cursor: pointer;">
                    <img src="<?= $row["image"] ?>" width="150px" alt="รูปภาพ">
                </div>
                <div class="col-4 centerrow" onclick="location.href='show.php?idx=<?= $row['productLine'] ?>';"
                    style="cursor: pointer; display: flex; align-items: center;"><?= $row["productLine"] ?></div>
                <div class="col-3 centerrow" onclick="location.href='show.php?idx=<?= $row['productLine'] ?>';"
                    style="cursor: pointer;">
                    <?= $row["textDescription"] ?>
                </div>
                <div class="col-2 centerrow" style="cursor: default;">
                    <a href="edit.php?idx=<?= $row['productLine'] ?>"><img src="images/edit.png" width="48px"
                            onclick="return confirm('ยืนยันการแก้ไขข้อมูลของ <?= $row['productLine'] ?> ?')"></a>&nbsp;&nbsp;&nbsp;
                    <a href="delete.php?idx=<?= $row['productLine'] ?>"><img src="images/delete.png" width="48px"
                            onclick="return confirm('ยืนยันการลบข้อมูลของ <?= $row['productLine'] ?> ?')"></a>
                </div>
            </div>
            <?php
                }
            ?>
        </div>
    </div>
    <script src="bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>