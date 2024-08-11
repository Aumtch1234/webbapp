<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="bootstrap-5.0.2-dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="insert.php" method="POST">
                    <label>Product Line:</label><br>
                    <input type="text" class="form-control" id="pline" name="proline"><br>
                    <label>Product Description:</label><br>
                    <input type="text" class="form-control" id="pdescript" name="prodescript"><br>
                    <button type="submit" class="btn btn-primary mb-2">Insert Product Line</button>
                </form>
                <a href="frm_update.php">Go to update</a>
            </div>
        </div>
    </div>
    <script src="bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>