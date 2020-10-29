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
    }
}
?>