<?php
require 'database.php';
require 'keijiban.php';

// タイムゾーン設定
date_default_timezone_set('Asia/Tokyo');

$user=new Usertext();
if (filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST') {
    // 表示名の入力チェック
    $err=$user->Validation();
    $keijiban=$user->getUserInfo();

    if (empty($err)) {
        // データベースに接続
        $pdo = connect();
        $finish=insertText($pdo,$keijiban->view_name,$keijiban->message,$keijiban->star);
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
    <link rel="stylesheet" media="all" href="../css/keijiban.css?2018030">
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
                <p class="form-title">今回の感想</p>
                <!-- ここにメッセージの入力フォームを設置 -->
                <?php if( !empty($finish) ): ?>
                <p>ありがとうございました!<br>メッセージを書き込みました</p>
                <p>
                    <button class="submit" onclick="location.href='board.php'">みんなの感想を見る</button>
                </p>
            </div>
            <?php exit; ?>
            <?php endif; ?>

            <?php if( !empty($err) ): ?>
            <ul class="error_message">
                <?php foreach( $err as $value ): ?>
                <li>・<?php echo $value; ?></li>
                <?php endforeach; ?>
            </ul>
            <?php endif; ?>
            <form method="post">
                <p>ニックネーム</p>
                <p class="form-title">
                <p class="mail">
                    <input id="view_name" type="text" name="view_name" value="">
                </p>

                <p>思ったことや感じたことなど、どんな事でもお気軽に記入してください！</p>
                <p class="form-title">
                <p class="messages">
                    <textarea id="message" name="message" style="width:100%; height:100px;"></textarea>
                </p>
                <p>今回の評価（５点満点）</p>
                <div class="evaluation">
                    <input id="star1" type="radio" name="star" value="5" />
                    <label for="star1"><span class="text">最高</span>★</label>
                    <input id="star2" type="radio" name="star" value="4" />
                    <label for="star2"><span class="text">良い</span>★</label>
                    <input id="star3" type="radio" name="star" value="3" />
                    <label for="star3"><span class="text">普通</span>★</label>
                    <input id="star4" type="radio" name="star" value="2" />
                    <label for="star4"><span class="text">悪い</span>★</label>
                    <input id="star5" type="radio" name="star" value="1" />
                    <label for="star5"><span class="text">最悪</span>★</label>
                </div>
                <div class="center">
                    <p class="submit"><input type="submit" name="btn_submit" value="書き込む"></p>
                </div>
            </form>
        </div>
    </div>
    </div>
</body>

</html>