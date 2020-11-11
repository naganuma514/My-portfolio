<?php

ini_set('display_errors', true);
error_reporting(E_ALL);

//セッションスタート。
session_start();


//DBとClassの読み込み。
require 'session.php';
if (!empty($_GET['btn_logout'])) {
    unsetlog();
}
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
    <title>Home | NOEVIER beaty studio chou chou </title>
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
                    <?php echo $login_user['user_name'];?>様</h2>
                <?php else:?>
                ゲスト様</h2>
                <?php endif;?>
                <nav id="mainnav">
                    <p id="menuWrap"><a id="menu"><span id="menuBtn"></span></a></p>
                    <div class="panel">
                        <ul>
                            <li><a href="../index.php #top">トップ</a></li>
                            <li><a href="../index.php #sec01">メッセージ</a></li>
                            <li><a href="../index.php #sec03">スタッフ</a></li>
                            <li><a href="../index.php #sec05">アクセス</a></li>
                            <?php if (isset($login_user)) : ?>
                            <li><a href="../mypage/mypage.php">マイページ</a></li>
                            <?php else : ?>
                            <li><a href="../login/add_user.php">ログイン</a></li>
                            <?php endif;?>
                            <li><a href="../booking/booking.php">ご予約</a></li>
                            <li><a href="">お問い合わせ</a></li>
                        </ul>
                        <ul id="sns">
                            <li><a href="#" target="_blank"><img src="../images/iconFb.png" width="20" height="20"
                                        alt="FB"></a></li>
                            <li><a href="#" target="_blank"><img src="../images/iconTw.png" width="20" height="20"
                                        alt="twitter"></a></li>
                            <li><a href="#" target="_blank"><img src="../images/iconInsta.png" width="20" height="20"
                                        alt="Instagram"></a></li>
                            <li><a href="#" target="_blank"><img src="../images/iconYouTube.png" width="20" height="20"
                                        alt="You Tube"></a></li>
                        </ul>
                    </div>
                </nav>
            </div>
            　　
        </div>
        　<div id="content">
            <div class="gologin">
            <h1><?php echo $login_user['user_name'];?>様のマイページ</h1><br>
                <form method="get" action="">
                <p class="submit"><input type="submit" name="btn_logout" value="ログアウトする" /></p>
                </form>
                <br><br>
                <button class="submit" onclick="location.href='look_book.php'">予約を確認する</button>
                
            </div>
        </div>
    </div>
</body>

</html>