<?php
session_start();
require_once './login/session.php';
if(isset($_SESSION["login_user"])) {
    $login_user=setSession($_SESSION["login_user"]);
}
?>
<!doctype html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="最新技術と自然との調和を目指す">
    <meta name="viewport" content="width=device-width">
    <title>Home | NOEVIER beaty studio chou chou </title>
    <link rel="stylesheet" media="all" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
    <script src="js/script.js"></script>
</head>

<body id="top">
    <div id="wrapper">
        <div id="sidebar">
            <div id="sidebarWrap">
            <h1>chou chou <br>
                <?php if (isset($login_user)) : ?>
                <?php echo $login_user['user_name'];?>様</h1> 
                <?php else : ?>
                    ゲスト様</h1>
                <?php endif;?>
                <nav id="mainnav">
                    <p id="menuWrap"><a id="menu"><span id="menuBtn"></span></a></p>
                    <div class="panel">
                        <ul>
                            <li><a href="#top">トップ</a></li>
                            <li><a href="#sec01">メッセージ</a></li>
                            <li><a href="#sec03">スタッフ</a></li>
                            <li><a href="#sec05">アクセス</a></li>
                            <li><a href="login/add_user.php">ログイン</a></li>
                            <li><a href="">ご予約</a></li>
                            <li><a href="">お問い合わせ</a></li>
                        </ul>
                        <ul id="sns">
                            <li><a href="#" target="_blank"><img src="images/iconFb.png" width="20" height="20"
                                        alt="FB"></a></li>
                            <li><a href="#" target="_blank"><img src="images/iconTw.png" width="20" height="20"
                                        alt="twitter"></a></li>
                            <li><a href="#" target="_blank"><img src="images/iconInsta.png" width="20" height="20"
                                        alt="Instagram"></a></li>
                            <li><a href="#" target="_blank"><img src="images/iconYouTube.png" width="20" height="20"
                                        alt="You Tube"></a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <div id="content">
            <div class="photo">
                <img src="images/chouchou.jpg" />
            </div>
            <!-- MESSAGE -->
            <section id="sec01">
                <header>
                    <h2><span>MESSAGE</span></h2>
                </header>
                <div class="innerS">
                    お客様をキレイにして差しげるのは、もちろん、気持ちがリラックスしたり、楽しかったり、スッキリしたり、頑張っている女性が笑顔で笑って、お帰り頂ける事を大切にして日々営業させて頂いております。
                </div>
            </section>
            <!-- // MESSAGE -->
            <!-- GALLERY -->
            <section id="sec02">
                <header>
                    <h2><span>GALLERY</span></h2>
                </header>
                <ul id="gallery">
                    <li><img src="images/photo01.jpg" width="360" height="350" alt=""></li>
                    <li><img src="images/photo02.jpg" width="360" height="350" alt=""></li>
                    <li><img src="images/photo03.jpg" width="360" height="350" alt=""></li>
                    <li><img src="images/photo04.jpg" width="360" height="350" alt=""></li>
                    <li><img src="images/photo05.jpg" width="360" height="350" alt=""></li>
                    <li><img src="images/photo06.jpg" width="360" height="350" alt=""></li>
                    <li class="full"><img src="images/photo07.jpg" width="1080" height="695" alt=""></li>
                    <li><img src="images/photo08.jpg" width="360" height="350" alt=""></li>
                    <li><img src="images/photo09.jpg" width="360" height="350" alt=""></li>
                    <li><img src="images/photo10.jpg" width="360" height="350" alt=""></li>
                    <li><img src="images/photo11.jpg" width="360" height="350" alt=""></li>
                    <li><img src="images/photo12.jpg" width="360" height="350" alt=""></li>
                    <li><img src="images/photo13.jpg" width="360" height="350" alt=""></li>
                </ul>
            </section>
            <!-- // GALLERY -->
            <!-- BRAND -->
            <section id="sec03">
                <header>
                    <h2><span>STAFF</span></h2>
                </header>
                <div class="inner">
                    <ul class="col4">
                        <li>
                            <p class="img"><img src="images/logo01.png" width="168" height="168" alt=""></p>
                            <p>ホームページサンプル株式会社では最動かす企業を目指します。</p>
                        </li>
                        <li>
                            <p class="img"><img src="images/logo02.png" width="168" height="168" alt=""></p>
                            <p>革新的な技術で世の中を動かす企業を目します。世の中を動かす。</p>
                        </li>
                        <li>
                            <p class="img"><img src="images/logo03.png" width="168" height="168" alt=""></p>
                            <p>株式会社では最動かす企業を目指しますージン企業を目指します。</p>
                        </li>
                        <li>
                            <p class="img"><img src="images/logo04.png" width="168" height="168" alt=""></p>
                            <p>株式会社では最動かす企業を指しますージサン企業を目指します。</p>
                        </li>
                    </ul>
                </div>
            </section>
            <!-- // BRAND -->
            <!-- PROJECT -->
            <section id="sec04">
                <header>
                    <h2><span>PROJECT</span></h2>
                </header>
                <div class="inner">
                    <div class="article">
                        <img src="images/photo14.jpg" width="370" height="224" alt="">
                        <p>ホームページサンプル株式会社では最新技術と自然との調和を目指します。革新的な革新的な革新的な技術で世の中を技術で世の中を技術で世の中を動かす企業を目指します。</p>
                        <p>ホームページサンプル株式会社。ホームページサンプル最新技術と自然との調和を目指します。革新的な技術で世の中を動かす企業を目指します。ホームページサンプル株式会社。ホームページサンプル最新技術と自然との調和を目指し調和を目指し調和を目指します。革新的な技術で世の中を動かす企業を目指します。
                        </p>
                    </div>
                    <div class="article">
                        <img src="images/photo15.jpg" width="370" height="224" alt="">
                        <p>ホームページサンプル株式会社では最新技術と自然との調和を目指します。革新的な革新的な革新的な技術で世の中を技術で世の中を技術で世の中を動かす企業を目指します。</p>
                        <p>ホームページサンプル株式会社。ホームページサンプル最新技術と自然との調和を目指します。革新的な技術で世の中を動かす企業を目指します。ホームページサンプル株式会社。ホームページサンプル最新技術と自然との調和を目指し調和を目指し調和を目指します。革新的な技術で世の中を動かす企業を目指します。
                        </p>
                    </div>
                </div>
            </section>
            <!-- // PROJECT -->
            <!-- COMPANY -->
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
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1224.989082464047!2d139.11570600966965!3d34.94837162061668!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6019c32e6ea5bdbf%3A0xd4a4ff42f17f5fb0!2z44OO44Ko44OT44KiIOODk-ODpeODvOODhuOCo-ODvOOCueOCv-OCuOOCqiDjgrfjg6Xjgrfjg6U!5e0!3m2!1sja!2sjp!4v1603453261389!5m2!1sja!2sjp"
                                    width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""
                                    aria-hidden="false" tabindex="0"></iframe>
                                <!-- // GOOGLE MAP -->
                            </div>
                        </li>
                    </ul>
                </div>
            </section>
            <!-- // COMPANY -->

            <footer id="footer">
                Copyright(c) 2016 Sample Inc. All Rights Reserved. Design by <a href="http://f-tpl.com"
                    target="_blank">http://f-tpl.com</a><!-- ←クレジット表記を外す場合はシリアルキーが必要です http://f-tpl.com/credit/ -->
            </footer>

        </div>
    </div>

</body>

</html>