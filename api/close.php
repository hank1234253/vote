<?php
include_once "../db.php";
date_default_timezone_set("Asia/Taipei");
$subject=$pdo->query("select * from `topics` where `id`={$_GET['id']}")->fetch();
$duration=strtotime($subject['close_time'])-strtotime($subject['open_time']);
$new_close=date("Y-m-d H:i:s",strtotime("now")-1);
$new_open=date("Y-m-d H:i:s",strtotime("now")-$duration-1);
$sql="update `topics` set `open_time`='{$new_open}',`close_time`='{$new_close}' where `id`={$_GET['id']}";
$pdo->exec($sql);
header("location:../backend.php");