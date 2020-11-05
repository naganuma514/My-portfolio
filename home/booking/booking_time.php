<?php
session_start();


require 'database.php';
require 'session.php';

if (!isset($_SESSION['login_user'])) {
    backUser();
}else{
    $login_user=$_SESSION['login_user'];
}

if(isset($_GET['booktime'])) {
$booktime=$_GET['booktime'];
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
                            <li><a href="../login/add_user.php">ログイン</a></li>
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

<form action="check.php" method="post">
<input type="hidden" name="booktime" value=$booktime>
<input type="radio" name="course" value="フィットカラー">フィットカラー<br>
<input type="radio" name="course" value="フェイシァルトリートメント ハーバルラグジュアリーコース">フェイシァルトリートメント ハーバルラグジュアリーコース<br>
<input type="radio" name="course" value="メイクレッスン">メイクレッスン<br>
<input type="radio" name="course" value="メンバーさんの毎月のフォローフェイシァル">メンバーさんの毎月のフォローフェイシァル<br>
<input type="radio" name="course" value="フェイシｧル体験 30分コース">フェイシｧル体験 30分コース<br>   
      <input type="submit" name="submit" value="送信" />

</form>
    
    </div>
</body>
</html>