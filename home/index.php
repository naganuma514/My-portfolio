<?php
session_start();
require_once './login/session.php';
require_once './login/database.php';
require_once './like/like.php';
if (isset($_SESSION["login_user"])) {
    $login_user=setSession($_SESSION['login_user']);
}
?>
<!doctype html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="最新技術と自然との調和を目指す">
    <meta name="viewport" content="width=device-width">
    <title>beaty studio chou chou </title>
    <link rel="stylesheet" media="all" href="css/style.css?2018038">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
    <script src="js/script.js"></script>
</head>

<body id="top">
    <div id="wrapper">
        <div id="sidebar">
            <div id="sidebarWrap">
                <h1>chou chou <br>
                    <?php if (isset($login_user)) : ?>
                    <?php echo h($login_user['user_name']);?>様</h1>
                <?php else : ?>
                ゲスト様</h1>
                <?php endif;?>
                <nav id="mainnav">
                    <p id="menuWrap"><a id="menu"><span id="menuBtn"></span></a></p>
                    <div class="panel">
                        <ul>
                            <li><a href="#top">トップ</a></li>
                            <li><a href="#sec01">メッセージ</a></li>
                            <li><a href="#sec04">ポートフォリオ</a></li>
                            <li><a href="#sec05">アクセス</a></li>
                            <?php if (isset($login_user)) : ?>
                            <li><a href="mypage/mypage.php">マイページ</a></li>
                            <?php else : ?>
                            <li><a href="login/login_user.php">ログイン（練習中）</a></li>
                            <?php endif;?>
                            <li><a href="booking/booking.php">ご予約（練習中）</a></li>
                            <li><a href="keijiban/board.php">お客様の感想</a></li>
                        </ul>
                        <ul id="sns">
                            <li><a href="https://m.facebook.com/people/あけみ-永沼/100009407933366?locale2=ja_JP"
                                    target="_blank"><img src="images/iconFb.png" width="20" height="20" alt="FB"></a>
                            </li>
                            <li><a href="https://instagram.com/akemi_naganuma?igshid=12ufni45rbr8p" target="_blank"><img
                                        src="images/iconInsta.png" width="20" height="20" alt="Instagram"></a></li>
                            <li><a href="https://www.youtube.com/watch?v=kIapP22ndtI&feature=emb_title"
                                    target="_blank"><img src="images/iconYouTube.png" width="20" height="20"
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
                <div class="inner">
                    お化粧品販売を通してお客様をキレイにして差しげるのはもちろん、<br>気持ちがリラックスしたり、楽しかったり、スッキリしたり、頑張っている女性が笑顔で笑ってお帰り頂ける事を大切にして日々営業させて頂いております。
                </div>
            </section>
            <!-- // MESSAGE -->
            <!-- GALLERY -->
            <section id="sec02">
                <header>
                    <h2><span>GALLERY</span></h2>
                </header>
                <ul id="gallery">
                    <li><iframe width="100%" height="230" src="https://www.youtube.com/embed/tl55B_kc444" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe></li>
                    <li><img src="images/akemikorona.jpg" width="100%" height="100%" alt=""></li>
                    <li><img src="images/newmenu2.jpg" width="100%" height="100%" alt=""></li>
                    <li class="full"><img src="images/width.jpg" width="100%" height="100%" alt=""></li>
                    <li><img src="images/hand.jpg" width="360" height="350" alt=""></li>
                    <li><img src="images/tree.jpg" width="100%" height="100%" alt=""></li>
                    <li><img src="images/tating2.jpg" width="100%" height="100%" alt=""></li>
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
                            <p class="img"><img src="images/naganumaakemi.jpg" width="168" height="168" alt=""></p>
                            <p>
                            <h3 style="text-align:center;">永沼あけみ</h3><br>
                            48歳、 21歳と18歳の母です。このお仕事を初めて16年目になります。
                            お客様にキレイになって頂く事、リラックス、元気にスッキリして笑顔で笑ってお帰り頂く事を一番大切にして、お仕事をさせて頂いております。
                            この業界は売り付けられる、しつこいなどのイメージがありますが、私のサロンは絶対に、そのような事は無いので安心してお気軽に、お越し下さい！✊
                            <br>資格 <br>・タイ古式・アロマ<br>・スキンケアアドバイザー<br>・メイク養成講座<br>・フィットカラー
                            </p>
                        </li>
                        <li>
                            <p class="img"><img src="images/kikukawa3.jpg" width="168" height="168" alt=""></p>
                            <p>
                            <h3 style="text-align:center;">掬川百合子</h3><br>
                            お肌悩みのご相談や日々のスキンケアアドバイスは勿論、癒しの時間、綺麗のお手伝いをさせて頂きます。お客様のお喜びの声や笑顔が私の活力です。いつまでも若々しく、未来の自分の為に、お客様と一緒に楽しく自分磨きのサポートをさせて頂きます。
                            <br>資格<br>・スキンケアアドバイザー<br>・メイクアップ<br>・フィットカラー</p>
                        </li>
                        <li>
                            <p class="img"><img src="images/ooshio.jpg" width="168" height="168" alt=""></p>
                            <p>
                            <h3 style="text-align:center;">大塩昭子</h3><br>
                            埼玉から伊東に移り住み、はや25年。すっかり伊東人になりました。美味しそうな話し、楽しそうな話し、健康になる話しを聞いたら即、実行！もちろんメインは、いつまでも若く元気に美しくなる話しです！
                            二度とない人生だから‥この出会いを大切に。女性である事を一緒に楽しみましょう💕
                            楽しくリラックスできるひとときを
                            過ごしていただけたら嬉しいです。
                            <br>資格<br>・スキンケアアドバイザー<br>・メイクアップ<br>・フィットカラー<br>・ホームヘルパー2級⁈</p>
                        </li>

                    </ul>
                </div>
            </section>
            <!-- // BRAND -->
            <!-- PROJECT -->
            <section id="sec04">
                <header>
                    <h2><span>PORTFOLIO</span></h2>
                </header>
                <div class="article">
                    <img src="images/musuko.jpg" width="370" height="224" alt="">
                    <p>当サロン店長の長男、永沼優大です。<br>母がいつもお世話になっております。<br></p>
                    <p>３月からコロナ禍になり、お客様が来店しづらい状況が続きました。
                        それでも不慣れなSNSを使い、宣伝を頑張っていた母を見て何かできることは無いかと自分なりに考え、生まれたのがこのwebサイトです。
                        <br><br>
                        このサイトはHTML、CSS、JavaScript、PHPというプログラミング言語を使って製作しました。最も使っている言語はPHPです。<br>
                        主な機能として<br>
                        ・ログイン機能（お客様のご利用は現在は不可）<br>
                        ・予約機能（お客様のご利用は現在は不可）<br>
                        ・レビュー、感想機能<br>
                        ・母の管理機能<br><br>
                        しかしログインと予約は個人情報を扱うため、お客様に使ってもらうにはさらなる安全対策が必要という課題を見つけました。<br>
                        今回初めてプログラミングを学習しましたが、とても奥が深く、難しい技術です。しかし誰かに使ってもらう、喜んでもらう
                        ために学ぶというプロセスに魅力を感じました。さらに学んでいき、いつか完璧なログイン機能、予約機能をお客様にご利用いただけたらと思います。楽しみにお待ちください。
                    </p>
                </div>
                <header>
                    <h2><span>PROJECT</span></h2>
                </header>
                <div class="inner">
                    <div class="article">
                        <img src="images/akemikorona.jpg" width="370" height="224" alt="">
                        <p>このようなご時世なので、当店では感染予防対策を徹底しています。近頃コンビニでよく目にするビニールカーテンを手作りして、お手入れ時に使用しています。
                            完全個別制、換気、消毒、マスク、手洗い、等、様々な対策を取り、お客様に安心してお越し頂けるよう、対策しております。</p>
                        <h3><br>・フィットカラー　30分 ￥1,500（税込）<br>
                            ・メイクレッスン　60分 ￥500（税込）<br>
                            ・フェイシァルトリートメント <br>ハーバルラグジュアリーコース　60分 ￥3,300（税込）<br>
                            ・フェイシｧル体験 30分コース　30分 ￥2,200（税込）<br>
                        </h3>
                        <h2><button class="submit"
                                onclick="location.href='https://reserva.be/chouchou5353'">予約する（こちらは利用可能です）</button></h2>
                    </div>
                    <img src="images/awa.jpg" width="600" height="695" alt="">

                    <br><br>
                    <h3>お客様１人１人を大切に。コロナ禍に負けない元気なお店を目指します！<br>
                        ぜひお気軽にご連絡お待ちしております。</h3>
                </div>
            </section>
            <div class="innerS">
                    <p style="text-align:center;">現在のいいね数</p>
                    <p class="Heart1"><a href="like/like_plus.php" style="text-align:center; font-size:40px; color:fuchsia; text-decoration:none;"
                        alt="ハートボタン">&#9829;<?php likePush($likes); ?>いいね&#9829;</a></p>
                    <h3 style="text-align:center;">サイトが気に入ったら気軽にハートを押してね！</h3>
                </div>
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
                            <p>TEL 08026673281</p>
                            <p><a href="https://instagram.com/akemi_naganuma?igshid=51dmc6ggj0c6">インスタグラム</a></p>
                            <p><a href="https://m.facebook.com/people/あけみ-永沼/100009407933366?locale2=ja_JP">フェイスブック</a>
                            </p>
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
        </div>
    </div>
</body>

</html>