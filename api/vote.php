<?php
include_once "../db.php";

$options = $_POST['desc'];
$subject_id = $_POST['subject_id'];
$type=$pdo->query("select `type` from `topics` where `id`='{$subject_id}'")->fetchColumn();
switch ($type) {
    case 1:
        $pdo->exec("update `options` set `total`=`total`+1 where `id`='{$options}'");
        break;
    case 2:
        foreach ($options as $opt) {
            $pdo->exec("update `options` set `total`=`total`+1 where `id`='{$opt}'");
        }
        break;
}
if(isset($_SESSION['login'])){
    
    $mem_id=$pdo->query("select `id` from `members` where `acc`= '{$_SESSION['login']}'")->fetchColumn();
}else{
    $mem_id=0;
}
$topic_id=$_POST['subject_id'];
date_default_timezone_set("Asia/Taipei");
$vote_time=date("Y-m-d H:i:s");
$records=serialize([$_POST['subject_id']=>$options]);

$sql="insert into `logs`(`mem_id`,`topic_id`,`vote_time`,`records`)
                   values('$mem_id','$topic_id','$vote_time','$records')";
$pdo->exec($sql);
header("location:../index.php?do=result&id={$subject_id}");
