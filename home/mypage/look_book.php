<?php

ini_set('display_errors', true);
error_reporting(E_ALL);

//セッションスタート。
session_start();


//DBとClassの読み込み。

require 'session.php';
require 'database.php';
if (!isset($_SESSION["login_user"])) {
    backUser($_SESSION["login_user"]);
}
if (isset($_SESSION["login_user"])) {
    $login_user=setSession($_SESSION['login_user']);
}
?>
<!doctype html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="最新技術と自然との調和を目指す">
    <meta name="viewport" content="width=device-width">
    <title>beaty studio chou chou </title>
    <link rel="stylesheet" media="all" href="../css/login.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
    <script src="../js/script.js"></script>
</head>

<body id="top">
    <div id="wrapper">
        <div id="sidebar">
            <div id="sidebarWrap">
                <h2>chou chou <br>
                    <?php if (isset($login_user)) : ?>
                    <?php echo h($login_user['user_name']);?>様</h2>
                <?php else:?>
                ゲスト様</h2>
                <?php endif;?>
                <nav id="mainnav">
                    <p id="menuWrap"><a id="menu"><span id="menuBtn"></span></a></p>
                    <div class="panel">
                        <ul>
                            <li><a href="../index.php#top">トップ</a></li>
                            <li><a href="../index.php#sec01">メッセージ</a></li>
                            <li><a href="../index.php#sec04">ポートフォリオ</a></li>
                            <li><a href="../index.php#sec05">アクセス</a></li>
                            <?php if (isset($login_user)) : ?>
                            <li><a href="../mypage/mypage.php">マイページ</a></li>
                            <?php else : ?>
                            <li><a href="../login/login_user.php">ログイン（練習中）</a></li>
                            <?php endif;?>
                            <li><a href="../booking/booking.php">ご予約（練習中）</a></li>
                            <li><a href="../keijiban/board.php">お客様の感想</a></li>
                        </ul>
                        <ul id="sns">
                            <li><a href="https://m.facebook.com/people/あけみ-永沼/100009407933366?locale2=ja_JP"
                                    target="_blank"><img src="../images/iconFb.png" width="20" height="20" alt="FB"></a>
                            </li>
                            <li><a href="https://instagram.com/akemi_naganuma?igshid=12ufni45rbr8p" target="_blank"><img
                                        src="../images/iconInsta.png" width="20" height="20" alt="Instagram"></a></li>
                            <li><a href="https://www.youtube.com/watch?v=kIapP22ndtI&feature=emb_title"
                                    target="_blank"><img src="../images/iconYouTube.png" width="20" height="20"
                                        alt="You Tube"></a></li>
                        </ul>
                    </div>
                </nav>
            </div>
            　　
        </div>
        　<div id="content">
            <div class="gologin">
                <?php 
            $pdo = connect();
             // SQL、パラメータ定義
            $rows=lookbook($pdo,$login_user['user_name']);

            if(!empty($rows)) {
                foreach($rows as $row) {
                    echo date('Y年-m月-d日 H時i分', strtotime(h($row['datetime'])));
                    echo "<br>";
                }
                 echo '予約をキャンセルしたい場合、誤って予約された場合';
                 echo '08026673281 までご連絡下さい';
            }else{
                echo '現在予定されている予約はありません';
                echo "<br>";
                echo "<button class='submit' onclick="."location.href='../index.php'".">ホームに戻る</button>";

            }

            ?>
            </div>
        </div>
    </div>
</body>

</html>