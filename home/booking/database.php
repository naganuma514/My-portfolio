<?php 


function h($string)
{
    return htmlspecialchars($string, ENT_QUOTES, 'utf-8');
}

function connect()
{
        $dsn = 'mysql:host=localhost;dbname=reserver;charset=utf8mb4;';
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

function insertText($pdo,$a,$b) {
    $stmt = $pdo->prepare('INSERT INTO `reser` (`id`, `name`, `datetime`) VALUES (null, ?, ?)');
        

        $params = [0 => $a, 1 => $b];
            
        $success = $stmt->execute($params);
            
        if ($success) {
            echo '予約が完了しました';
        } 
} 
function insertbook($pdo,$user_name,$phone,$email,$course,$booktime){
        $stmt = $pdo->prepare('INSERT INTO `reser` (`id`, `name`, `phone`,`email`,`course`,`datetime`) VALUES (null, ?, ?, ?, ?, ?)');
        // パラメータ設定
        $params = [0 => $user_name, 1 => $phone, 2 => $email, 3 => $course, 4 => $booktime];
        // SQL実行
        $success = $stmt->execute($params);
        return $success;
}




?>
