<?php
ini_set('display_errors', true);
error_reporting(E_ALL);

session_start();


require 'database.php';
require 'login_class.php';

if(isset($login_user)){
    header('Location:account.php');
}

$err = [];
$login = new Login();
if (filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST') {
    $err = $login->Validation();
    $user = $login->getUserInfo();

    if (count($err) === 0) {
        // DB接続
        $pdo = connect();

        // SQL、パラメータ定義
        $stmt = $pdo->prepare('SELECT * FROM USER WHERE email = ?');
        
        $params = [];
        $params[] = $user->email;

        $stmt->execute($params);

        $rows = $stmt->fetchAll();
        
        // パスワード検証
        foreach ($rows as $row) {
            $password_hash = $row['password'];

            // パスワード一致
            if (password_verify($user->password, $password_hash)) {
                session_regenerate_id(true);
                $_SESSION['login_user'] = $row;
                header('Location:account.php');
                return;
            }
        }
        $err['login'] = 'ログインに失敗しました。';
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
    <div id="sidebar">
        <div id="sidebarWrap">
            <h2>chou chou <br>ゲスト様</h2>
            <nav id="mainnav">
                <p id="menuWrap"><a id="menu"><span id="menuBtn"></span></a></p>
                <div class="panel">
                    <ul>
                        <li><a href="../index.php #top">トップ</a></li>
                        <li><a href="../index.php #sec01">メッセージ</a></li>
                        <li><a href="../index.php #sec03">スタッフ</a></li>
                        <li><a href="../index.php #sec05">アクセス</a></li>
                        <li><a href="">ログイン</a></li>
                        <li><a href="">ご予約</a></li>
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

        <?php if (count($err) !== 0) : ?>
        <?php foreach ($err as $e) : ?>
        <p class="error">・<?php echo h($e); ?></p>
        <?php endforeach; ?>
        <?php endif; ?>

        <legend>ログイン</legend>
        <div id="form">
            <p class="form-title">ログインページ</p>
            <?php if (count($err) !== 0) : ?>
            <?php foreach ($err as $e) : ?>
            <p class="error" style="color:red;">・<?php echo h($e); ?></p>
            <?php endforeach; ?>
            <?php endif; ?>
            <form action="" method="post">
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
                </p>
                <div class="center">
                    <p class="submit"><input type="submit" value="ログイン"></p>
                    </>
                    <p class="logmessage">登録がお済みで無い方はこちらから<br><a href="add_user.php">新規登録</a>して下さい。</p>
                </div>
            </form>
        </div>
    </div>

</body>

</html>