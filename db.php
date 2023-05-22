<?php
$dsn="mysql:host=localhost;charset=utf8;dbname=vote";
$pdo=new PDO($dsn,'root','');
session_start();
$msg=[
    1=>"本調查為會員限定，請先登入後再進行投票",
    2=>"本調查已結束，請進行其他調查"
];
?>