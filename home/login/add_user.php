<?php

ini_set('display_errors', true);
error_reporting(E_ALL);

//セッションスタート。
session_start();


//DBとClassの読み込み。
require 'database.php';
require 'add_class.php';
require 'session.php';
//もうログインされてたらホームに飛ばす
if (isset($_SESSION["login_user"])) {
    $login_user=setSession($_SESSION['login_user']);
    loginCheck($login_user);
}
//エラーメッセージ入れる箱
$err = [];
//レジスタークラス作成
$register = new Register();
//もしPOSTがあれば追加判定開始
if (filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST') {
    $err = $register->Validation();
    $user = $register->getUserInfo();
//もしエラーがなければ処理開始
    if (count($err) === 0) {
        // DB接続
        $pdo = connect();
        $same =loginuser($pdo, $user->email);
        // SQL実行
        if (empty($same)) {
            $success = adduser($pdo, $user->password, $user->user_name,$user->email, );
        } else {
            $err['same']= "そのメールアドレスは既に登録されています";
        }
    }
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
            <!-- SQLが成功していたら -->
            <?php if (isset($success) && $success) : ?>
            <div class="gologin">
                <p>ありがとうございます。登録に成功しました。<br>ログインへお進みください。</p>
                <p>
                    <button class="submit" onclick="location.href='login_user.php'">ログインページへ</button>
                </p>
            </div>
            <!-- SQLが未実行の時 -->
            <?php else : ?>
            <legend>新規アカウント登録フォーム</legend>
            <div id="form">
                <p class="form-title">新規会員登録ページ</p>
                <p style="text-align:center">登録が完了している方は<a href="login_user.php">こちらから<br>ログイン</a>して下さい。</p><br>
                <p style="text-align:center">うまく登録できない場合は<a href="../index.php #sec05">お電話</a>からご予約お願い致します。</p>
                <?php if (count($err) !== 0) : ?>
                <?php foreach ($err as $e) : ?>
                <p class="error" style="color:red;">・<?php echo h($e); ?></p>
                <?php endforeach; ?>
                <?php endif; ?>
                <form action="" method="post">
                    <p>名前</p>
                    <p class="form-title">
                    <p class="mail">
                        <input id="user_name" name="user_name" type="text" autofocus>
                    </p>
                    <p>メールアドレス</p>
                    <p class="form-title">
                    <p class="mail">
                        <input id="email" name="email" type="text" />
                    </p>
                    <p>パスワード</p>
                    <p class="form-title">
                    <p class="pass">
                        <input id="password" name="password" type="password" />
                    </p>
                    <p>確認用パスワード</p>
                    <p class="form-title">
                    <p class="pass">
                        <input id="password_conf" name="password_conf" type="password" />
                    </p>
                    </p>
                    <div class="center">
                        <p>現在この機能は練習中です！もっと完璧な安全対策を構築出来るようになってからお客様に使ってもらいたいので、あくまで息子の勉強の成果として公開させていただきます。申し訳ありませんが、お客様のご利用はお控えください。頑張って勉強するので楽しみにお待ちください。
                        </p>
                        <p class="submit"><input type="submit" value="練習用新規登録を使ってみる" /></p>
                    </div>
                </form>
                <?php endif;?>
            </div>
        </div>
    </div>
</body>

</html>