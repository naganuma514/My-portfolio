<?php
function setSession($session)
{
    if (isset($session)) {
        session_regenerate_id(true);
        $login_user=$session;
        return $login_user;
    }
}
function MainSession($session)
{
    if (isset($session)) {
        session_regenerate_id(true);
        $main_user=$session;
        return $main_user;
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

    function MainCheck($session) {
        if(isset($session)) {
            header("Location:../mother/mother_home.php");
        exit;   
        } elseif (filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST') {
                unset($session);
                header("Location:../mother/mother_home.php");
                exit;
            }
        }


function backUser($session, $session2) {
    if (!isset($session) && !isset($session2)) {
        header('Location:/../index.php');
        exit;
    }
}
?>