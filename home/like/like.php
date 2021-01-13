<?php
require 'database.php';


$pdo=likeconnect();

$likes=likeCount($pdo);

function likePush($likes) {
    echo $likes;
}

?>

