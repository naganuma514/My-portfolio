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
function connect2()
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
            
        return $success;
} 
function connect3()
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
function finishcheck($success) {
    if (isset($success)) {
        echo '無事に完了したよ！';
        echo "<button class='submit' onclick="."location.href='mother_home.php'".">ホームに戻る</button>";
        exit;
    } 
}
function delete($pdo,$delete) {
    $sql = "DELETE FROM message WHERE id = :id";
 
    // 削除するレコードのIDは空のまま、SQL実行の準備をする
    $stmt = $pdo->prepare($sql);
 
    // 削除するレコードのIDを配列に格納する
    $params = array(':id'=>$delete);
 
    // 削除するレコードのIDが入った変数をexecuteにセットしてSQLを実行
    $stmt->execute($params);
 
    // 削除完了のメッセージ
    echo '削除完了しました';
    echo "<button class='submit' onclick="."location.href='mother_home.php'".">ホームに戻る</button>";
    exit;
} 
function reser($pdo) {
    $sql = "SELECT * FROM reser  ORDER BY id DESC LIMIT 0,50";
    $stmt = $pdo->query($sql);
    return $stmt;
      }
      function user($pdo) {
        $sql = "SELECT * FROM user";
        $stmt = $pdo->query($sql);
        return $stmt;
          }
      function reserdelete($pdo,$delete) {
        $sql = "DELETE FROM reser WHERE id = :id";
     
        // 削除するレコードのIDは空のまま、SQL実行の準備をする
        $stmt = $pdo->prepare($sql);
     
        // 削除するレコードのIDを配列に格納する
        $params = array(':id'=>$delete);
     
        // 削除するレコードのIDが入った変数をexecuteにセットしてSQLを実行
        $stmt->execute($params);
     
        // 削除完了のメッセージ
        echo '削除完了しました';
        echo "<button class='submit' onclick="."location.href='mother_home.php'".">ホームに戻る</button>";
        exit;
    } 
    function userdelete($pdo,$delete) {
        $sql = "DELETE FROM user WHERE id = :id";
     
        // 削除するレコードのIDは空のまま、SQL実行の準備をする
        $stmt = $pdo->prepare($sql);
     
        // 削除するレコードのIDを配列に格納する
        $params = array(':id'=>$delete);
     
        // 削除するレコードのIDが入った変数をexecuteにセットしてSQLを実行
        $stmt->execute($params);
     
        // 削除完了のメッセージ
        echo '削除完了しました';
        echo "<button class='submit' onclick="."location.href='mother_home.php'".">ホームに戻る</button>";
        exit;
    } 