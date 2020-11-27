<?php

function h($string)
{
    return htmlspecialchars($string, ENT_QUOTES, 'utf-8');
}

function connect()
{
        $dsn = 'mysql:host=localhost;dbname=board;charset=utf8mb4;';
        $username = 'root';
        $password = '';


    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ];

    $pdo = null;

    try {
        $pdo = new PDO($dsn, $username, $password, $options);
    } catch(PDOException $e) {
        echo '<p>'.$e->getMessage().'</p>';
    }

    return $pdo;
}
function insertText($pdo,$a,$b,$c) {
        $stmt = $pdo->prepare('INSERT INTO `message` (`id`, `view_name`, `message`, `post_date`, `star`) VALUES (null, ?, ?, ?, ?)');
        
        $now_date = date("Y-m-d H:i:s");

        $params = [0 => $a, 1 => $b, 2 =>$now_date, 3 => $c];
            
        $success = $stmt->execute($params);
            
        if ($success) {
            $finish='メッセージを書き込みました。';
            return $finish;
        } 
} 
function think($pdo) {
$sql = "SELECT * FROM message ORDER BY id DESC LIMIT 0,20;";
$stmt = $pdo->query($sql);
return $stmt;
  }
function Avg($pdo) {
$sql="SELECT avg(star) FROM message";
$avg=$pdo->query($sql);
Avg2($avg);
}
function Avg2($avg) {
    foreach($avg as $av){
        $av["avg(star)"]=round($av["avg(star)"]);
        echo $av["avg(star)"];
  }
}

