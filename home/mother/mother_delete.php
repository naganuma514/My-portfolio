<?php 
date_default_timezone_set('Asia/Tokyo');
session_start();

require 'database.php';
require 'session.php';
if(isset($_SESSION['main_user'])) {
    $main_user=$_SESSION['main_user'];
}
if(isset($_GET['reservation'])) {
    $user_id=$_GET['reservation'];
}
if(!isset($main_user)) {
    comebackUser($main_user);
}
if(isset($_POST['delete'])) {
    $pdo=connect2();
    reserdelete($pdo,$user_id); 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
    <input type="hidden" name="delete" value="1"></p>
    <p class="submit"><input type="submit" value="予約を削除する"></p>
    </form>
</body>
</html>