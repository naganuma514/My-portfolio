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
                    <button class='submit' onclick="."location.href="."'../login/add_user.php'>ログインページへ</button>
                </p>
            </h2>
            </div>";
            exit;
    }

?>