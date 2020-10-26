<?php

ini_set('display_errors', true);
error_reporting(E_ALL);

//セッションスタート。
session_start();

//DBとClassの読み込み。
require 'database.php';
require 'add_class.php';

$err = [];
$register = new Register();
if (filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST') {
    $err = $register->Validation();
    $user = $register->getUserInfo();

    if (count($err) === 0) {
        // DB接続
        $pdo = connect();

        // ステートメント
        $stmt = $pdo->prepare('INSERT INTO `USER` (`id`, `user_name`, `email`, `password`) VALUES (null, ?, ?, ?)');

        // パラメータ設定
        $pass_hash = password_hash($user->password, PASSWORD_DEFAULT);
        $params = [0 => $user->user_name, 1 => $user->email, 2 => $pass_hash];

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
	<link rel="stylesheet" media="all" href="../css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
	<script src="js/script.js"></script>
</head>

<body id="top">
	<div id="wrapper">
		<div id="sidebar">
			<div id="sidebarWrap">
				<h1 width="87" height="0">chou chou <br>ゲスト様</h1>
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
							<li><a href="#" target="_blank"><img src="../images/iconFb.png" width="20" height="20" alt="FB"></a></li>
							<li><a href="#" target="_blank"><img src="../images/iconTw.png" width="20" height="20" alt="twitter"></a></li>
							<li><a href="#" target="_blank"><img src="../images/iconInsta.png" width="20" height="20" alt="Instagram"></a></li>
							<li><a href="#" target="_blank"><img src="../images/iconYouTube.png" width="20" height="20" alt="You Tube"></a></li>
						</ul>
					</div>
				</nav>
			</div>
		</div>
        <div class="content">
    <?php if (isset($success) && $success) : ?>
        <p>登録に成功しました。</p>
        <p><a href="index.php">こちらからログインしてください。</a></p>
    <?php else : ?>
        <div class="form-frame">
            <legend>新規アカウント登録フォーム</legend>
            <h1>新規会員登録</h1>
            <?php if (count($err) !== 0) : ?>
                <?php foreach ($err as $e) : ?>
                    <p class="error">・<?php echo h($e); ?></p>
                <?php endforeach; ?>
            <?php endif; ?>
            <form action="" method="post">
                <p>
                    <label class="form-frame__label" for="user_name">ユーザー名</label>
                    <input id="user_name" name="user_name" type="text" />
                </p>
                <p>
                    <label class="form-frame__label" for="email">メールアドレス</label>
                    <input id="email" name="email" type="text" />
                </p>
                <p>
                    <label class="form-frame__label" for="password">パスワード</label>
                    <input id="password" name="password" type="password" />
                </p>
                <p>
                    <label class="form-frame__label" for="password_conf">確認用パスワード</label>
                    <input id="password_conf" name="password_conf" type="password" />
                </p>
                <p>
                    <button type="submit">登録</button>
                </p>
                <p>
                    <a href="index.php">ログイン</a>
                </p>
            </form>
        </div>
    <?php endif; ?>
    <div id="content">
			<section id="sec05">
				<header>
					<h2><span>COMPANY</span></h2>
				</header>
				<div class="inner">
					<ul class="col2">
						<li>
							<p>〒414-0044<br>静岡県伊東市川奈１２５９−５３</p>
							<p>TEL +818026673281</p>
							<p><a href="https://instagram.com/akemi_naganuma?igshid=51dmc6ggj0c6">インスタグラム</a></p>
							<p></p>
						</li>
						<li>
							<div id="map">
								<!-- GOOGLE MAP -->
								<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1224.989082464047!2d139.11570600966965!3d34.94837162061668!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6019c32e6ea5bdbf%3A0xd4a4ff42f17f5fb0!2z44OO44Ko44OT44KiIOODk-ODpeODvOODhuOCo-ODvOOCueOCv-OCuOOCqiDjgrfjg6Xjgrfjg6U!5e0!3m2!1sja!2sjp!4v1603453261389!5m2!1sja!2sjp" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
								<!-- // GOOGLE MAP -->
							</div>
						</li>
					</ul>
				</div>
			</section>
			<!-- // COMPANY -->

			<footer id="footer">
				Copyright(c) 2016 Sample Inc. All Rights Reserved. Design by <a href="http://f-tpl.com" target="_blank">http://f-tpl.com</a><!-- ←クレジット表記を外す場合はシリアルキーが必要です http://f-tpl.com/credit/ -->
			</footer>

		</div>
</body>

</html>