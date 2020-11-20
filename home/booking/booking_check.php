<?php

ini_set('display_errors', true);
error_reporting(E_ALL);

//セッションスタート。
session_start();


//DBとClassの読み込み。
require 'database.php';
require 'bookcheck_class.php';
require 'session.php';
if (!isset($_SESSION['login_user'])) {
    backUser();
}
if (isset($_SESSION["login_user"])) {
    $login_user=setSession($_SESSION['login_user']);
}
if(!isset($_POST['course'])) {
    course();
}
if ($_POST['booktime'] !== date("Y-m-d H:i:s", strtotime($_POST['booktime']))) {
    booktimes();
}

$err = [];
$register = new Register();
if (filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST') {
    $err = $register->Validation();
    $user = $register->getUserInfo();

    if (count($err) === 0) {
        
        // DB接続
        $pdo = connect();

        // ステートメント
        $success=insertbook($pdo,$user->user_name, $user->phone,$user->email,$user->course,$user->booktime);

    }
}
?>
<!doctype html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="最新技術と自然との調和を目指す">
    <meta name="viewport" content="width=device-width">
    <title>Home | NOEVIER beaty studio chou chou </title>
    <link rel="stylesheet" media="all" href="../css/booking.css?20180926">
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
                            <li><a href="../login/login_user.php">ログイン</a></li>
                            <?php endif;?>
                            <li><a href="../booking/booking.php">ご予約</a></li>
                            <li><a href="../keijiban/board.php">お客様の感想</a></li>
                        </ul>
                        <ul id="sns">
                            <li><a href="#" target="_blank"><img src="../images/iconFb.png" width="20" height="20"
                                        alt="FB"></a></li>
                            <li><a href="#" target="_blank"><img src="../images/iconTw.png" width="20" height="20"
                                        alt="twitter"></a></li>
                            <li><a href="#" target="_blank"><img src="../images/iconInsta.png" width="20" height="20"
                                        alt="Instagram"></a></li>
                            <li><a href="#" target="_blank"><img src="../images/iconYouTube.png" width="20" height="20"
                                        alt="YouTube"></a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>


        <div id="content">
            <div class="gologin">
                <?php if (count($err) !== 0) : ?>
                <?php foreach ($err as $er) : ?>
                <?php echo $er; ?>
                <?php endforeach; ?>
                <?php elseif (isset($success)) : ?>
                <h1>予約が完了しました。</h1>
                <p><?php echo $user->user_name; ?>様</p>
                <p><?php echo $user->booktime; ?></p>
                <button class='submit' onclick="location.href='../index.php'">ホームに戻る</button>
                <?php else  : ?>
                <h1>予約に失敗しました。<br>
                    もう一度日時を選択してください。</h1>
                <button class='submit' onclick="location.href='booking_time.php'">日時指定に戻る</button>
                <?php endif; ?>


            </div>
        </div>
    </div>
</body>

</html>