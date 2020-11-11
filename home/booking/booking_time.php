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
    <title>Home | NOEVIER beaty studio chou chou </title>
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
                            <li><a href="../login/add_user.php">ログイン</a></li>
                            <?php endif;?>
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
                                        alt="YouTube"></a></li>
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
                    <input type="hidden" name="user_name" value="<?php echo $login_user['user_name']; ?>">
                    <input type="hidden" name="phone" value="<?php echo $login_user['phone']; ?>">
                    <input type="hidden" name="email" value="<?php echo $login_user['email']; ?>">
                    <input type="hidden" name="booktime" value="<?php echo $booktime; ?>">
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
                        <p class="submit"><input type="submit" value="予約を確定する" /></p>　<br>
                        <button type="button" onclick="history.back()">日付を選び直す</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>