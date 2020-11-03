<?php
// タイムゾーンを設定
date_default_timezone_set('Asia/Tokyo');

// 前月・次月リンクが押された場合は、GETパラメーターから年月を取得
if (isset($_GET['ym'])) {
    $ym = $_GET['ym'];
} else{
   // 今月の年月を表示
    $ym=date('Y-m-d 9:00:00');
}
// タイムスタンプを作成し、フォーマットをチェックする
$timestamp = strtotime($ym);
if ($timestamp === false) {
    $ym = date('Y-m-d 9:00:00');
    $timestamp = strtotime(('Y-m-d h:i:s'), $ym);
}
echo $timestamp;
echo date('Y-m-d h:i:s', $timestamp);
$dt = new DateTime();
// 今日の日付 フォーマット　例）2018-07-3
$today = $dt->format('Y-m-d');

// カレンダーのタイトルを作成　例）2017年7月
$html_title = date('n月d日', $timestamp);

// 前月・次月の年月を取得
$prev = date('Y-m-d 9:00:00');
$next = date('Y-m-d 9:00:00', strtotime('+1 week', $timestamp));


//曜日を取得
$syuu = [
    '日', '月', '火','水', '木', '金', '土',
  ];
$youbi = date('w', $timestamp);




// カレンダー作成の準備
$weeks = [];
$week = '';

// 第１週目：空のセルを追加
// 例）１日が水曜日だった場合、日曜日から火曜日の３つ分の空セルを追加する

for ( $day = 1; $day <= 1; $day++, $youbi++) {

    // 2017-07-3
    $date = $ym . '-' . $day;
    $daytime = strtotime($date);
    $todaytime = strtotime($today);

    if ($today == $date) {
        // 今日の日付の場合は、class="today"をつける
        $week .= '<td class="today">' . $day;
    } elseif ($daytime > $todaytime) {
            $week .= '<td>' . $day . "<a href='date_time.php?reservation=$date'>予定を追加</a>";
        } 
    else {
        $week .= '<td>' . $day;
    }
    $week .= '</td>';

    // 週終わり、または、月終わりの場合
    if ($youbi % 7 == 6 ) {

        if ($day == $day_count) {
            // 月の最終日の場合、空セルを追加
            // 例）最終日が木曜日の場合、金・土曜日の空セルを追加
            $week .= str_repeat('<td></td>', 6 - ($youbi % 7));
        }

        // weeks配列にtrと$weekを追加する
        $weeks[] = '<tr>' . $week . '</tr>';

        // weekをリセット
        $week = '';
	}
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
    td,
    tr,
    th {
        display: block
    }

    .left {
        align: right;
    }
    </style>
</head>

<body>
    <div class="container">
        <h3><a href="?ym=<?php echo $prev; ?>">&lt;</a> <?php echo $html_title; ?> <a
                href="?ym=<?php echo $next; ?>">&gt;</a></h3>

        <table class="booking" border="1" align="left">
            <tr>
                <td>時間</td>
                <td>9:00</td>
                <td>9:30</td>
                <td>10:00</td>
                <td>10:30</td>
                <td>11:00</td>
                <td>11:30</td>
                <td>12:00</td>
                <td>12:30</td>
                <td>13:00</td>
                <td>13:30</td>
                <td>14:00</td>
                <td>14:30</td>
                <td>15:00</td>
                <td>15:30</td>
                <td>16:00</td>
                <td>16:30</td>
                <td>17:00</td>
                <td>17:30</td>
                <td>18:00</td>
                <td>18:30</td>
                <td>19:00</td>
                <td>19:30</td>
            </tr>
        </table>



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