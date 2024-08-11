<?php 
session_start();

$editIndex = isset($_GET['edit']) ? $_GET['edit'] : '';
$editId = $editIndex !== '' ? $_SESSION['id'][$editIndex] : '';
$editFname = $editIndex !== '' ? $_SESSION['fname'][$editIndex] : '';
$editName = $editIndex !== '' ? $_SESSION['name'][$editIndex] : '';
$editLname = $editIndex !== '' ? $_SESSION['lname'][$editIndex] : '';
$editClass = $editIndex !== '' ? $_SESSION['class'][$editIndex] : '';
$editGpa = $editIndex !== '' ? $_SESSION['gpa'][$editIndex] : '';
$editBirth = $editIndex !== '' ? $_SESSION['birth'][$editIndex] : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Work Page2 | Session</title>
</head>
<body style="text-align: center;">
    <h1><?php echo $editIndex !== '' ? 'แก้ไขข้อมูลนิสิต' : 'เพิ่มข้อมูลนิสิตใหม่'; ?></h1>
    <a href="index.php">กลับไปที่หน้าแรก</a><br><br><br><br>

    <form method="post" action="index.php">
        <input type="hidden" name="index" value="<?php echo $editIndex; ?>">
        <label>รหัสนิสิต: <input type="text" name="id" value="<?php echo $editId; ?>"> </label><br><br>

        <label for="fname">คำนำหน้า 
            <select name="fname" id="fname">
                <option value="นาย" <?php echo $editFname == 'นาย' ? 'selected' : ''; ?>>นาย</option>
                <option value="นางสาว" <?php echo $editFname == 'นางสาว' ? 'selected' : ''; ?>>นางสาว</option>
            </select>
        </label>
        <label>ชื่อนิสิต: 
            <input type="text" name="name" value="<?php echo $editName; ?>"> 
        </label>
        <label>นามสกุลนิสิต: 
            <input type="text" name="lname" value="<?php echo $editLname; ?>">
        </label><br><br>

        <label for="class">ชั้นปี
            <select name="class" id="class">
                <option value="1" <?php echo $editClass == '1' ? 'selected' : ''; ?>>1</option>
                <option value="2" <?php echo $editClass == '2' ? 'selected' : ''; ?>>2</option>
                <option value="3" <?php echo $editClass == '3' ? 'selected' : ''; ?>>3</option>
                <option value="4" <?php echo $editClass == '4' ? 'selected' : ''; ?>>4</option>
            </select>
        </label>
        <label>เกรดเฉลี่ย: 
            <input type="text" name="gpa" value="<?php echo $editGpa; ?>">
        </label>
        <label>วันเกิด
            <input type="date" name="birth" value="<?php echo $editBirth; ?>">
        </label><br><br>
        <button type="submit"><?php echo $editIndex !== '' ? 'แก้ไขข้อมูล' : 'เพิ่มข้อมูล'; ?></button><br><br><br><br>
        
    </form>
</body>
</html>
