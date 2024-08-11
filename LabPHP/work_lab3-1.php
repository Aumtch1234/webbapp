<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>html | Work3-1</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <script type="text/javascript">
            function alert_data(){
                var data_input = document.myForm.name.value
                if(data_input == null || data_input == ""){
                    alert("Please input data")
                    return false
                }
                else{
                    alert("input data is : " + data_input)
                    
                    return true
                } 
            }
        </script>
    </head>
    <body>
        
        <form name="myForm" onsubmit="return alert_data()" method="POST" action="work_lab3-1.php">
            <label>Name:</label>
            <input type="text" name="name">
            <input type="submit" value="Submit">
        </form>
        
        <h1>Value input is: <?php echo isset($_POST['name']) ? $_POST['name'] : ''; ?></h1>
        

    </body>
</html>