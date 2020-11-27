<?php
function setSession($session)
{
    if (isset($session)) {
        session_regenerate_id(true);
        $login_user=$session;
        return $login_user;
    }
}

function loginCheck($session) {
    if(isset($session)) {
    header('Location:../index.php');
    exit;   
    } elseif (filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST') {
            unset($session);
            header('Location:../index.php');
            exit;
        }
    }


function backUser() {
         
    echo "
    <div class='gologin'>
    <h2　style='text-align:center; fomt-size:100px;'>
                <p>ご予約には会員登録が必要です。<br>お済みでない方はこちらからお願いします。</p>
                <p>
                    <button class='submit' onclick="."location.href="."'../login/login_user.php'>ログインページへ</button>
                </p>
            </h2>
            </div>";
            exit;
    }
function course() {
    echo "
    <div class='gologin'>
    <h2　style='text-align:center; fomt-size:100px;'>
                <p>コースが未選択です<br></p>
                <p>
                    <button class='submit' onclick="."location.href="."'booking_time.php'>コースを選択する</button>
                </p>
            </h2>
            </div>";
            exit;
}
function booktimes() {
    echo "
    <div class='gologin'>
    <h2　style='text-align:center; fomt-size:100px;'>
                <p>希望時刻が未選択です<br></p>
                <p>
                    <button class='submit' onclick="."location.href="."'booking_time.php'>希望日時を選択する</button>
                </p>
            </h2>
            </div>";
            exit;
}
function comebackUser($session) {
    if (!isset($session)) {
        header('Location:/../index.php');
        exit;
    }
}
?>