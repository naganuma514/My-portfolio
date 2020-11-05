<?php
// タイムゾーンを設定
date_default_timezone_set('Asia/Tokyo');
require 'database.php';

// 前月・次月リンクが押された場合は、GETパラメーターから年月を取得
if (isset($_GET['ym'])) {
    $ym = $_GET['ym'];
} else{
   // 今月の年月を表示
    $ym=date('Y-m-d 09:00:00',strtotime('+1 day'));
}
// タイムスタンプを作成し、フォーマットをチェックする
$timestamp = strtotime($ym);
if ($timestamp === false) {
    $ym = date('Y-m-d 09:00:00',strtotime('+1 day'));
    $timestamp = strtotime($ym);
}
// 今日の日付 フォーマット　例）2018-07-3


// カレンダーのタイトルを作成　例）2017年7月
$html_title = date('n月d日', $timestamp);

// 前月・次月の年月を取得
$prev = date('Y-m-d 09:00:00',strtotime('+1 day'));
$next = date('Y-m-d 09:00:00', strtotime('+1 week', $timestamp));
$nextday=date('j', strtotime('+1 day', $timestamp));


//曜日を取得
$syuu = ['日', '月', '火','水', '木', '金', '土',];



// カレンダー作成の準備
$weeks = [];
$week = '';

// 第１週目：空のセルを追加
// 例）１日が水曜日だった場合、日曜日から火曜日の３つ分の空セルを追加する

for ($i=$ym; $i<$next; $i = date('Y-m-d 09:00:00',strtotime($i . '+1 day'))) {
    $today=date('j',strtotime($i));
    $youbi=date('w',strtotime($i));
    $week.="<table class='booking' border='1' align='left'> <tr><td> $today <br> $syuu[$youbi] </td>";
    
    for($abc=1; $abc<=22 ; $abc++) {
        if(empty($booktime)) {
            $booktime=$i;
        }
        $bbotimes=[];
        $booktimes=[
            date('Y-m-d H:i:s',strtotime($booktime.'-1 hours')),
            date('Y-m-d H:i:s',strtotime($booktime.'-30 minutes')),
            $booktime,
            date('Y-m-d H:i:s',strtotime($booktime.'+30 minutes')),
            date('Y-m-d H:i:s',strtotime($booktime.'+1 hours'))
        ];
        
        $pdo = connect();

        $stmt = $pdo->prepare("SELECT * FROM reser where datetime = ? or datetime = ? or datetime = ? or datetime = ? or datetime = ?");
        // ステートメント
        $stmt->bindValue(1,$booktimes[0]);
        $stmt->bindValue(2,$booktimes[1]);
        $stmt->bindValue(3,$booktimes[2]);
        $stmt->bindValue(4,$booktimes[3]);
        $stmt->bindValue(5,$booktimes[4]);
        
        // パラメータ設定
        $stmt->execute();

        $all = $stmt->fetchAll();

         if(empty($all)) {
            $week.='<td>'. "<a href='booking_time.php?booktime=$booktime'>◎</a>" .'</td>';
        }else{
             $week.="<td> ✖ </td>";
         }
        $booktime=date('Y-m-d H:i:s',strtotime($booktime.'+30 minutes'));

    }
    $week.="</tr></table>";
    $weeks[]=$week;
    $week='';
    $booktime='';
}
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
        <h3><a href="?ym=<?php echo $prev; ?>">&lt;</a> <?php echo $html_title; ?> <a
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