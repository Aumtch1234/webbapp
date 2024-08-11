<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>html | Work3-2</title>

    <script type="text/javascript">
    function alert_data() {
        var input_name = document.myForm.name.value;
        var input_idcard = document.myForm.idcard.value;

        if (input_name == "" && input_idcard == "") {
            alert("Form must be filled");
            return false;
        } else if (!/^[A-Za-z\s]+$/.test(input_name) && input_idcard == "") {
            alert("Name must be filled in English");
            return false;
        } else if (/^[A-Za-z\s]+$/.test(input_name) && input_idcard == "") {
            alert("ID card must be filled");
            return false;
        } else if (/^[A-Za-z\s]+$/.test(input_name) && !/^[0-9]+$/.test(input_idcard)) {
            alert("ID card must input number");
            return false;
        } else if (/^[A-Za-z\s]+$/.test(input_name) && (input_idcard.length !== 13 || !/^\d+$/.test(input_idcard))) {
            alert("ID card must have 13 digits and contain only numbers");
            return false;
        } else {
            alert("Thank you for data");
            return true;
        }
    }
    </script>
</head>

<body>

    <form name="myForm" onsubmit="return alert_data()" method="POST" action="action_page1.php">
        <label>Name:</label>
        <input type="text" name="name" value="<?php echo isset($_POST['name']) ? $_POST['name'] : ''; ?>">

        <label>ID Card:</label>
        <input type="text" name="idcard" value="<?php echo isset($_POST['idcard']) ? $_POST['idcard'] : ''; ?>">

        <input type="submit" value="Submit">
    </form>

    <?php
    // Check if form data has been submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve the values from the form
        $input_name = $_POST["name"];
        $input_idcard = $_POST["idcard"];

        // Display the input values
        echo "<p>Input value is: {$input_name}, ID Card: {$input_idcard}</p>";
    } else {
        // If accessed directly without POST data, show an error message
        echo "<p>Error: Form data not submitted.</p>";
    }
    ?>


</body>

</html>
