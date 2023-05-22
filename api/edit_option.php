<?php
include_once "../db.php";
echo $sql="select `subject_id` from `options` where `id`='{$_POST['id']}'";
$id=$pdo->query($sql)->fetchColumn();
$pdo->exec("update `options` set `description`='{$_POST['name']}',`total`='{$_POST['total']}' where `id`='{$_POST['id']}'");
header("location:../backend.php?do=result&id={$id}");
?>