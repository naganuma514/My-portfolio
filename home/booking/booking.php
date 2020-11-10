<?php
// タイムゾーンを設定
session_start();
if(isset($_SESSION["login_user"])) {
    $login_user=$_SESSION["login_user"];
}

require 'database.php';
require 'booking_class.php';
date_default_timezone_set('Asia/Tokyo');

// 前月・次月リンクが押された場合は、GETパラメーターから年月を取得
$book=new Booking;

//タイムスタンプをセット
$book->makeStamp();

//〇✖予約表を配列にして作成
$weeks=$book->weeks();

//GETで日にちを操作するための変数
$prev = date('Y-m-d 09:00:00',strtotime('+1 day'));
$next = $book->afterWeek();
?>
<!doctype html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="最新技術と自然との調和を目指す">
    <meta name="viewport" content="width=device-width">
    <title>Home | NOEVIER beaty studio chou chou </title>
    <link rel="stylesheet" media="all" href="../css/booking.css">
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
                                        alt="YouTube"></a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <div id="content">
            <h1>予約フォーム</h1>
            <p>ご希望の日時を選択してください。</p>
            <h3><a href="?ym=<?php echo $prev; ?>">&lt;</a>
                <?php $book->getHtmltitle(); ?>
                <a href="?ym=<?php echo $next; ?>">&gt;</a>
            </h3>
            <div class="booklist">
                <table class='bookingtable' style=”height: 448px;” width=”742″>
                    <table class='booking' border='1' align='left'>
                        <tr>
                            <th>予約</th>
                            <th>9:00</th>
                            <th>9:30</th>
                            <th>10:00</th>
                            <th>10:30</th>
                            <th>11:00</th>
                            <th>11:30</th>
                            <th>12:00</th>
                            <th>12:30</th>
                            <th>13:00</th>
                            <th>13:30</th>
                            <th>14:00</th>
                            <th>14:30</th>
                            <th>15:00</th>
                            <th>15:30</th>
                            <th>16:00</th>
                            <th>16:30</th>
                            <th>17:00</th>
                            <th>17:30</th>
                            <th>18:00</th>
                            <th>18:30</th>
                            <th>19:00</th>
                            <th>19:30</th>
                        </tr>
                    </table>
                    <?php
                foreach ($weeks as $week) {
                    echo $week;
                }
            ?>
                </table>
            </div>
        </div>
    </div>
</body>

</html>