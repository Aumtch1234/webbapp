<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap-5.0.2-dist/css/bootstrap.min.css">
</head>

<body>
    <?php
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        include "dbconnect.php";
        $jsonArr = ['pk' => '', 'desc' => ''];
        if(isset($_POST["listproductline"])){
            $lspline = $_POST["listproductline"];
            echo "test $lspline";

            $jsonArr = json_decode($lspline, true);
            echo $jsonArr['pk']. " ". $jsonArr['desc'];
        }
    ?>
    <div class="container">
        <form action="" method="POST">
            <select name="listproductline" onchange="this.form.submit()">
                <option value="select">Please select Product Line</option>
                <?php
                    $stmt = $conn->prepare("SELECT * FROM productlines");
                    $stmt->execute();
                    $result = $stmt->get_result();
                    if($result->num_rows > 0){
                        while($row = $result->fetch_assoc()){
                    ?>
                <option value='{"pk":"<?= $row["productLine"]; ?>", "desc":"<?= $row["textDescription"]; ?>"}'>
                    <?= $row["productLine"]; ?></option>
                <?php
                        }
                    }
                ?>
            </select>
        </form><br>
        <form action="update.php" class="form-group" method="post">
            <div class="form-group">
                <label for="pline">Product Line:</label><br>
                <input type="text" class="form-control" id="pline" name="proline" value="<?= $jsonArr['pk'] ?>"><br>
            </div>
            <div class="form-group">
                <label for="pdescript">Product Description:</label><br>
                <input type="text" class="form-control" id="pdescript" name="prodescript"
                    value="<?= $jsonArr['desc'] ?>"><br>
            </div>
            <button type="submit" class="btn btn-primary mb-2">Update Product Line</button>
        </form>

        <form action="delete.php" method="post">
                    <input type="hidden" class="form-control mb-2 mr-sm-2" name="proline" value="<?= $jsonArr['pk'] ?>">
                    <button type="submmit" class="btn btn-primary mb-2">Delete Product Line</button>
        </form>
        <a href="frm_insert.php">Go to insert</a>
    </div>

    <script src="bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</body>

</html>