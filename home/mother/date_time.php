<?php
require 'database.php';
if (filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST') {
if (isset($_POST['time']) && is_array($_POST['time'])) {
    $times = $_POST['time'];
    $name=$_POST['name'];
    foreach ($times as $time) {
        $pdo=connect2();
        $success=insertText($pdo, $name, $time);
    }
}
}else{
  $reser=$_GET['reservation'];
}
if(isset($success)) {
    finishcheck($success);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../js/mother.js"></script>
    <title>Document</title>
</head>

<body>
    都合の悪い時間を入力してください。
    <form action="" method="post" name="mother">
        <p>
            <label><input type="checkbox" name="time[]" value="<?php echo $reser ;?> 09:00">9:00</label>
            <label><input type="checkbox" name="time[]" value="<?php echo $reser ;?> 09:30">9:30</label>
            <label><input type="checkbox" name="time[]" value="<?php echo $reser ;?> 10:00">10:00</label>
            <label><input type="checkbox" name="time[]" value="<?php echo $reser ;?> 10:30">10:30</label><br>
            <label><input type="checkbox" name="time[]" value="<?php echo $reser ;?> 11:00">11:00</label>
            <label><input type="checkbox" name="time[]" value="<?php echo $reser ;?> 11:30">11:30</label>
            <label><input type="checkbox" name="time[]" value="<?php echo $reser ;?> 12:00">12:00</label>
            <label><input type="checkbox" name="time[]" value="<?php echo $reser ;?> 12:30">12:30</label><br>
            <label><input type="checkbox" name="time[]" value="<?php echo $reser ;?> 13:00">13:00</label>
            <label><input type="checkbox" name="time[]" value="<?php echo $reser ;?> 13:30">13:30</label>
            <label><input type="checkbox" name="time[]" value="<?php echo $reser ;?> 14:00">14:00</label>
            <label><input type="checkbox" name="time[]" value="<?php echo $reser ;?> 14:30">14:30</label><br>
            <label><input type="checkbox" name="time[]" value="<?php echo $reser ;?> 15:00">15:00</label>
            <label><input type="checkbox" name="time[]" value="<?php echo $reser ;?> 15:30">15:30</label>
            <label><input type="checkbox" name="time[]" value="<?php echo $reser ;?> 16:00">16:00</label>
            <label><input type="checkbox" name="time[]" value="<?php echo $reser ;?> 16:30">16:30</label><br>
            <label><input type="checkbox" name="time[]" value="<?php echo $reser ;?> 17:00">17:00</label>
            <label><input type="checkbox" name="time[]" value="<?php echo $reser ;?> 17:30">17:30</label>
            <label><input type="checkbox" name="time[]" value="<?php echo $reser ;?> 18:00">18:00</label>
            <label><input type="checkbox" name="time[]" value="<?php echo $reser ;?> 18:30">18:30</label><br>
            <label><input type="checkbox" name="time[]" value="<?php echo $reser ;?> 19:00">19:00</label>
            <label><input type="checkbox" name="time[]" value="<?php echo $reser ;?> 19:30">19:30</label>
        </p>
        <input type="hidden" name="name" value="あけみ">
        <input type="hidden" name="day" value="<?php echo $reser ;?>">
        <p>
            <input type="button" value="全部ON！" onclick="allcheck(true);">
            <input type="button" value="全部OFF！" onclick="allcheck(false);">
        </p>
        <input type='button' onclick='history.back()' value='戻る'>
        <br><br><br><br><button type="submit" name="b">送信</button>
    </form>
</body>

</html>