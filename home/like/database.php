<?php
function likeconnect()
{
        $dsn = 'mysql:host=localhost;dbname=login;charset=utf8mb4;';
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

function insertText($pdo) {
    $stmt = $pdo->prepare('INSERT INTO `likes` (`id`, `good`) VALUES (null, ?)');
        
        $params = [0 => "good"];
            
        $success = $stmt->execute($params);
} 

function likeCount($pdo) {
    
    $stmt= $stmt = $pdo->query("SELECT MAX(id) as maxid from likes");
    if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $maxid = $row['maxid'];
    } else {
    $maxid = 0;
    }
return $maxid;
}

function likesCount($pdo){
    $sql = "SELECT * FROM likes";
    $sth = $pdo -> query($sql);
    $count = $sth -> rowCount();
    return $count;
    }