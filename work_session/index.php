<?php 
session_start();

if(isset($_SESSION['id'])){
    $id = $_SESSION['id'];
    $fname = $_SESSION['fname'];
    $name = $_SESSION['name'];
    $lname = $_SESSION['lname'];
    $class = $_SESSION['class'];
    $gpa = $_SESSION['gpa'];
    $birth = $_SESSION['birth'];
} else {
    $id = [];
    $fname = [];
    $name = [];
    $lname = [];
    $class = [];
    $gpa = [];
    $birth = [];
}

// เช็คข้อมูลจาก method = 'POST'
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
    $index = $_POST['index'];
    if ($index === '') {
        // กรณีเพิ่มข้อมูลใหม่
        $id[] = $_POST['id'];
        $fname[] = $_POST['fname'];
        $name[] = $_POST['name'];
        $lname[] = $_POST['lname'];
        $class[] = $_POST['class'];
        $gpa[] = $_POST['gpa'];
        $birth[] = $_POST['birth'];
    } else {
        // กรณีแก้ไขข้อมูล
        $id[$index] = $_POST['id'];
        $fname[$index] = $_POST['fname'];
        $name[$index] = $_POST['name'];
        $lname[$index] = $_POST['lname'];
        $class[$index] = $_POST['class'];
        $gpa[$index] = $_POST['gpa'];
        $birth[$index] = $_POST['birth'];
    }
    
    $_SESSION['id'] = $id;
    $_SESSION['fname'] = $fname;
    $_SESSION['name'] = $name;
    $_SESSION['lname'] = $lname;
    $_SESSION['class'] = $class;
    $_SESSION['gpa'] = $gpa;
    $_SESSION['birth'] = $birth;
}

// เช็คข้อมูลจากการลบ
if(isset($_GET['delete'])){
    $deleteIndex = $_GET['delete'];
    if(isset($id[$deleteIndex])){
        unset($id[$deleteIndex]);
        unset($fname[$deleteIndex]);
        unset($name[$deleteIndex]);
        unset($lname[$deleteIndex]);
        unset($class[$deleteIndex]);
        unset($gpa[$deleteIndex]);
        unset($birth[$deleteIndex]);
        // รีเซ็ต array keys
        $id = array_values($id);
        $fname = array_values($fname);
        $name = array_values($name);
        $lname = array_values($lname);
        $class = array_values($class);
        $gpa = array_values($gpa);
        $birth = array_values($birth);
        
        $_SESSION['id'] = $id;
        $_SESSION['fname'] = $fname;
        $_SESSION['name'] = $name;
        $_SESSION['lname'] = $lname;
        $_SESSION['class'] = $class;
        $_SESSION['gpa'] = $gpa;
        $_SESSION['birth'] = $birth;  
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Work Page1 | Session</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body style="text-align: center;">
    <h1>แสดงข้อมูลนิสิตทั้งหมด</h1>
    <a href="addnew.php">เพิ่มข้อมูล</a><br><br>

    <?php
    $count = count($id);
    echo "ข้อมูลนิสิตทั้งหมด: {$count} คน<br><br>";
   
    if ($count > 0) {
        echo "<table class='table table-info table-striped'>
                <tr>
                    <th>รหัสนิสิต</th>
                    <th>คำนำหน้า</th>
                    <th>ชื่อนิสิต</th>
                    <th>นามสกุลนิสิต</th>
                    <th>ชั้น</th>
                    <th>เกรดเฉลี่ย</th>
                    <th>วันเกิด</th>
                    <th>จัดการข้อมูล</th>
                </tr>";
        foreach ($name as $key => $value) {
            echo "<tr>
                    <style>
                      .center{
                        text-align: center;
                      }
                    </style>
                    <td class='center'>{$id[$key]}</td>
                    <td class='center'>{$fname[$key]}</td>
                    <td class='center'>{$name[$key]}</td>
                    <td class='center'>{$lname[$key]}</td>
                    <td class='center'>{$class[$key]}</td>
                    <td class='center'>{$gpa[$key]}</td>
                    <td class='center'>{$birth[$key]}</td>
                    <td class='center'>
                        <a href='addnew.php?edit={$key}'>แก้ไข</a> 
                        <a href='index.php?delete={$key}'>ลบ</a>
                    </td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "ข้อมูลนิสิต: ไม่มีข้อมูลนิสิต";
    }
    ?>
</body>
</html>
