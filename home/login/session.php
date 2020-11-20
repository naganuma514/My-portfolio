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
        header("Location:../index.php");
    exit;   
    } elseif (filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST') {
            unset($session);
            header("Location:../index.php");
            exit;
        }
    }


function backUser($session) {
    if (!isset($_SESSION['login_user'])) {
        header('Location:/../index.php');
        exit;
    }
}
?>