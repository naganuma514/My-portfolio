<?php
require 'database.php';
require 'keijiban.php';

// タイムゾーン設定
date_default_timezone_set('Asia/Tokyo');
session_start();
if(isset($_SESSION["login_user"])) {
    $login_user=$_SESSION["login_user"];
}
if(isset($_SESSION["main_user"])) {
    $main_user=$_SESSION["main_user"];
}
//ここにデータを取得する処理が入る
$pdo = connect();
$stmt = think($pdo);
?>
<!doctype html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="最新技術と自然との調和を目指す">
    <meta name="viewport" content="width=device-width">
    <title>beaty studio chou chou </title>
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
                    <?php echo h($login_user['user_name']);?>様</h2>
                <?php else:?>
                ゲスト様</h2>
                <?php endif;?>
                <nav id="mainnav">
                    <p id="menuWrap"><a id="menu"><span id="menuBtn"></span></a></p>
                    <div class="panel">
                        <ul>
                            <li><a href="../index.php #top">トップ</a></li>
                            <li><a href="../index.php #sec01">メッセージ</a></li>
                            <li><a href="../index.php #sec04">ポートフォリオ</a></li>
                            <li><a href="../index.php #sec05">アクセス</a></li>
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
            <div id="form">
                <p class="form-title">皆様のご感想</p><br>
                <p>当店ではお手入れの後に、感想を自由に記入して頂いています。<br>
                    お手入れの内容・接客・楽しかった事まで、<br>どんな事でも
                    匿名でご記入出来るのでお気軽に記入して頂けたらと思います！</p>
                <h5 style="text-align:center;">お客様からの平均評価</h5>
                <h1 style="text-align:center;">
                    <span class="star5_rating" data-rate="<?php Avg($pdo); ?>"></span>
                </h1>
                <hr>
                <section>
                    <?php if( !empty($stmt) ): ?>
                    <?php foreach( $stmt as $value ): ?>
                    <article>
                        <div class="info">
                            <h2><?php echo h($value['view_name']); ?>さん</h2>
                            <time><?php echo date('Y年m月d日', strtotime($value['post_date'])); ?></time>
                            <?php if(isset($main_user)) {
                                echo "<a href='../mother/delete.php?reservation=$value[id]'>削除</a>";
                            }?>
                        </div>
                        <p><?php echo h($value['message']); ?></p>
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