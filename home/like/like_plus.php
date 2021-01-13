<?php
require 'database.php';

$pdo=likeconnect();
insertText($pdo);

header('Location:../index.php');
exit;