<?php
class Booking {
    //プロパティセット
    private $ym;
    private $timestamp;
    public $html_title;

    //GETリクエストチェック
    public function ym($get) {
        date_default_timezone_set('Asia/Tokyo');
        // 前月・次月リンクが押された場合は、GETパラメーターから年月を取得
        if (isset($get)) {
            $this->ym = $get;
        } else {
            // 今月の年月を表示
            $this->ym=date('Y-m-d 09:00:00', strtotime('+1 day'));
        }
    }
    
    //タイムスタンプ作成
    public function makeStamp() {
        date_default_timezone_set('Asia/Tokyo');
        //GETがあればその日の日付を表示
        if(isset(($_GET['ym']))){
        $this->ym($_GET['ym']);
        }
        //タイムスタンプをセット
        $this->timestamp = strtotime($this->ym);
        if ($this->timestamp === false) {
        $this->ym = date('Y-m-d 09:00:00',strtotime('+1 day'));
        $this->timestamp = strtotime($this->ym);
        }
    } 
     
    //タイトル作成
    public function getHtmltitle() {
        date_default_timezone_set('Asia/Tokyo');
        $this->html_title = date('n月d日', $this->timestamp);
        echo $this->html_title;
     }

     //1週間後取得
     public function afterWeek() {
        date_default_timezone_set('Asia/Tokyo');
        $next= date('Y-m-d 09:00:00', strtotime('+1 week', $this->timestamp));
        return $next;
     }

     //9時から19時30まで30分ずつ足していって22回ループ。それを7日間。
     //1度予約があると次の予約受付まで1時間30分開ける必要がある。
     //なので予約時間の前後１時間ずつに予約が入っていたら、その間は予約不可能としたい。
     public function weeks() {
        date_default_timezone_set('Asia/Tokyo');        
        
        //曜日を取得
        $syuu = ['日', '月', '火','水', '木', '金', '土',];
        //for文を終了日を定義
        $nextweek = date('Y-m-d 09:00:00', strtotime('+1 week', $this->timestamp));
        $week='';
        
        //ループ開始一週間   
        for ($i=$this->ym; $i<$nextweek; $i = date('Y-m-d 09:00:00',strtotime($i . '+1 day'))) {
            //日付と曜日取得
            $today=date('j',strtotime($i));
            $youbi=date('w',strtotime($i));
            //日付曜日セル作成
            $week.="<table class='booking' border='1' align='left'> <tr><td> $today <br> $syuu[$youbi] </td>";
            //22回ループ、データベースにその時間、またその前後１時間に予約があるか検索
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
                   //データベース検索
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
                    
                    //データベースに値があったかチェック
                    if(empty($all)) {
                        $week.='<td>'. "<a href='booking_time.php?booktime=$booktime'>◎</a>" .'</td>';
                    }else{
                        $week.="<td> ✖ </td>";
                    }
                    //３０分足してもう一度ループ
                    $booktime=date('Y-m-d H:i:s',strtotime($booktime.'+30 minutes'));
                }
                $week.="</tr></table>";
                $weeks[]=$week;
                $week='';
                $booktime='';
            }
            return $weeks;
        }
    }
?>