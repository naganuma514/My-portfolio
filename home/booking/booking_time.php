<?php
session_start();


require 'database.php';
require 'session.php';

if (isset($_SESSION['login_user'])) {
   $login_user=$_SESSION['login_user'];
}

if(isset($_GET['booktime'])) {
$booktime=$_GET['booktime'];
}else{
header('Location: booking.php');
exit;
}
?>
<!doctype html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="最新技術と自然との調和を目指す">
    <meta name="viewport" content="width=device-width">
    <title>beaty studio chou chou </title>
    <link rel="stylesheet" media="all" href="../css/booking.css?20180925">
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
            <div class="gologin">
                <h1>コースを選択してください</h1>

                <form action="booking_check.php" method="post">
                    <?php if (isset($login_user)) : ?>
                    <input type="hidden" name="user_name" value="<?php echo h($login_user['user_name']); ?>">
                    <input type="hidden" name="email" value="<?php echo h($login_user['email']); ?>">
                    <input type="hidden" name="booktime" value="<?php echo h($booktime); ?>">
                    <?php endif; ?>

                    <div class="float" align='center'>
                        <input id="fitcolor" type="radio" name="course" value="フィットカラー">
                        フィットカラー<br>30分 500円税込<br>
                        <label for="fitcolor"><img id="fitcolor" src="../images/fitcolor.jpg" width="150" height="150"
                                alt=""><br></label>
                        <p> 色、アクセサリーまでわかります<br>
                            所要時間30分程度です。<br>
                            お友達とご一緒ですと、より楽しくみれます。<br>
                            料金は500円(税込)<br>
                            レッスン内で使用する商品（エクストラ薬用・５０５薬用<br>
                            を使用予定、お茶代、会場費として）」<br>
                            （※会場費に家賃は含まず）</p>
                    </div>
                    <br><br>

                    <div class="float" align='center'>
                        <input id="babaru" type="radio" name="course" value="フェイシァルトリートメント ハーバルラグジュアリーコース">
                        フェイシァルトリートメント ハーバルラグジュアリーコース<br>60分
                        ￥3,300（税込）<br>
                        <label for="babaru"><img id="babaru" src="../images/babal.jpg" width="150" height="150"
                                alt=""><br></label>
                        <p> ハーバル化粧品を使用した<br>
                            オールハンドのフェイシァルです。<br>
                            年齢に応じたお手入れ。最上級シリーズのエクストラや505シリーズを使用、<br>
                            年齢に応じたお手入れで心地よい一時をお楽しみ下さい。<br>
                            ○初めての方一回限り1,000円(税込)<br>
                            ○ご招待券をお持ちの方は初回無料でご体験頂けます。
                            小さなお子様連れ大歓迎です。</p>
                    </div>
                    <br><br>

                    <div class="float" align='center'>
                        <input id="meiku" type="radio" name="course" value="メイクレッスン">
                        メイクレッスン<br>60分
                        ￥500（税込）<br>
                        <label for="meiku"><img id="meiku" src="../images/meiku.jpg" width="150" height="150"
                                alt=""><br></label>
                        <p> 似合うマユの描き方、チークの入れ方、<br>
                            目を大きく魅せる方法、可愛く魅せるメイク、
                            等々、メイクの仕方をレッスン形式で、お伝えさせて頂きます。<br>
                            料金500円(税込)<br>
                            レッスン内で使用する商品（エクストラ・５０５使用予定、お茶代、会場費として）」<br>
                            （※会場費に家賃は含まず）</p>
                    </div>
                    <br><br>

                    <div class="float" align='center'>
                        <input id="facetaiken" type="radio" name="course" value="フェイシｧル体験 30分コース">
                        フェイシｧル体験 30分コース<br>30分
                        ￥2,200（税込）<br>
                        <label for="facetaiken"><img id="facetaiken" src="../images/face.jpg" width="150" height="150"
                                alt=""><br></label>
                        <p> ハーバルスキンケアシリーズ、エクストラ、505シリーズを使用した、<br>
                            オールハンドのじっくりていねいなクレンジング。<br>
                            ○通常2200円のコースを、初めての方1回限り500円税込でご体験頂けます。</p>
                    </div>
                    <br><br>
                    <div class="center">
                        <br>
                        <p>現在この機能は練習中です！もっと完璧な安全対策を構築出来るようになってからお客様に使ってもらいたいので、あくまで息子の勉強の成果として公開させていただきます。申し訳ありませんが、お客様のご利用はお控えください。頑張って勉強するので楽しみにお待ちください。
                        </p>
                        <p class="submit"><input type="submit" value="練習用予約を使ってみる" /></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>