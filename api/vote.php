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
header("location:../index.php?do=result&id={$subject_id}");
