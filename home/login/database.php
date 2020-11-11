<?php

function h($string)
{
    return htmlspecialchars($string, ENT_QUOTES, 'utf-8');
}

function connect()
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
function adduser($pdo,$password,$name,$phone,$email) {
    $stmt = $pdo->prepare('INSERT INTO `USER` (`id`, `user_name`, `phone`,`email`,`password`) VALUES (null, ?, ?, ?, ?)');

        // パラメータ設定
        $pass_hash = password_hash($password, PASSWORD_DEFAULT);
        $params = [0 => $name, 1 => $phone, 2 => $email, 3 => $pass_hash];

        // SQL実行
        $success = $stmt->execute($params);
        return $success;
}
function loginuser($pdo,$email) {
    $stmt = $pdo->prepare('SELECT * FROM USER WHERE email = ?');
        
    $params = [];
    $params[] = $email;

    $stmt->execute($params);

    $rows = $stmt->fetchAll();
    return $rows;
}
