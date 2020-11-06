<?php
// タイムゾーンを設定
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
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>PHPカレンダー</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP" rel="stylesheet">
    <style>
    .booking td,tr,th {
        display: block;
        width:70px;
        height:55px;
        text-align:center;
        vertical-align:middle;
        font-size:20px;
    }

    
    </style>
</head>

<body>
    <div class="container">
        <h3><a href="?ym=<?php echo $prev; ?>">&lt;</a> <?php $book->getHtmltitle(); ?> <a
                href="?ym=<?php echo $next; ?>">&gt;</a></h3>

        <table class='booking' border='1' align='left'>
            <tr>
                <th>時間</th>
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



        <!--  <table border="1" align="left">
            <tr>
                <td>1番目</td>
            </tr>
        </table>
        <table border="1" align="left">
            <tr>
                <td>2番目</td>
            </tr>
        </table>
        <table border="2" align="left">
            <tr>
                <td>2番目</td>
            </tr>
        </table> -->

    </div>
</body>

</html>