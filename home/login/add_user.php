<?php

ini_set('display_errors', true);
error_reporting(E_ALL);

//セッションスタート。
session_start();


//DBとClassの読み込み。
require 'database.php';
require 'add_class.php';
require 'session.php';
if (isset($_SESSION["login_user"])) {
    $login_user=setSession($_SESSION['login_user']);
    loginCheck($login_user);
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
        $stmt = $pdo->prepare('INSERT INTO `USER` (`id`, `user_name`, `phone`,`email`,`password`) VALUES (null, ?, ?, ?, ?)');

        // パラメータ設定
        $pass_hash = password_hash($user->password, PASSWORD_DEFAULT);
        $params = [0 => $user->user_name, 1 => $user->phone, 2 => $user->email, 3 => $pass_hash];

        // SQL実行
        $success = $stmt->execute($params);
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
                            <li><a href="">ログイン</a></li>
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
            <?php if (isset($success) && $success) : ?>
            <div class="gologin">
                <p>ありがとうございます。登録に成功しました。<br>ログインへお進みください。</p>
                <p>
                    <button class="submit" onclick="location.href='login_user.php'">ログインページへ</button>
                </p>
            </div>
            <?php else : ?>
            <legend>新規アカウント登録フォーム</legend>
            <div id="form">
                <p class="form-title">新規会員登録ページ</p>
                <p style="text-align:center">登録が完了している方は<a href="login_user.php">こちらから<br>ログイン</a>して下さい。</p>
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
                    <p>電話番号</p>
                    <p class="form-title">
                    <p class="phone">
                        <input id="phone" name="phone" type="text" />
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
                        <p class="submit"><input type="submit" value="新規登録" /></p>
                    </div>
                </form>
                <?php endif;?>
            </div>
        </div>
    </div>
</body>

</html>