<?php
require 'database.php';
require 'session.php';

// タイムゾーン設定
date_default_timezone_set('Asia/Tokyo');
session_start();
if(!isset($_SESSION["main_user"])) {
    comebackUser($_SESSION["main_user"]);
}
if(isset($_SESSION["main_user"])) {
    $main_user=$_SESSION["main_user"];
}
//ここにデータを取得する処理が入る
$pdo = connect2();
$stmt = reser($pdo);
?>
<!doctype html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="最新技術と自然との調和を目指す">
    <meta name="viewport" content="width=device-width">
    <title>Home | NOEVIER beaty studio chou chou </title>
    <link rel="stylesheet" media="all" href="../css/booking.css?2018030">
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
                            <li><a href="https://m.facebook.com/people/あけみ-永沼/100009407933366?locale2=ja_JP" target="_blank"><img
                                        src="../images/iconFb.png" width="20" height="20" alt="FB"></a></li>
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
            <div id="form">
                <h1 style="text-align:center;">
                </h1>
                <hr>
                <section>
                    <?php if( !empty($stmt) ): ?>
                    <?php foreach( $stmt as $value ): ?>
                    <article>
                        <div class="info">
                            <h2><?php echo $value['name']; ?>さん</h2><br>
                            <h2><?php echo $value['phone']; ?></h2><br>
                            <h2><?php echo $value['email']; ?></h2><br>
                            <h2><?php echo $value['course']; ?></h2><br>   
                            <?php if(isset($main_user)) {
                                echo "<a href='mother_delete.php?reservation=$value[id]'>削除</a>";
                            }?>
                        </div>
                        <p><?php echo $value['datetime']; ?></p>
                        <hr>
                    </article>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </section>
            </div>
        </div>
    </div>
</body>

</html>