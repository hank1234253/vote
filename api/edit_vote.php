<?php
include_once "../db.php";
$sql = "update `topics`
           set `subject`='{$_POST['subject']}',
               `open_time`='{$_POST['open_time']}',
               `close_time`='{$_POST['close_time']}',
               `type`='{$_POST['type']}',
               `login`='{$_POST['login']}'
         where `id`='{$_POST['subject_id']}'";
$pdo->exec($sql);
$options = $pdo->query("select `id` from `options` where `subject_id`='{$_POST['subject_id']}'")->fetchAll();

//刪除
if (!empty($options)) {
    if (isset($_POST["opt_subject_id"])) {
        foreach ($options as $opt) {
            if (!in_array($opt['id'], $_POST['opt_subject_id'])) {
                $pdo->exec("delete from `options` where `id`='{$opt['id']}'");
            }
        }
    } else {
        $pdo->exec("delete from `options` where `subject_id`='{$_POST['subject_id']}'");
    }
}
//更新
if (isset($_POST['opt_subject_id'])) {
    foreach ($_POST['opt_subject_id'] as $index => $id) {
        $pdo->exec("update `options` set `description`='{$_POST['description'][$index]}' where `id`='{$id}'");
        unset($_POST['description'][$index]);
    }
}

//新增
if (!empty($_POST['description'])) {
    foreach ($_POST['description'] as $des) {
        if (!empty($des)) {
            $check = $pdo->query("select count(*) from `options` where `description`='{$des}'")->fetch();
            if ($check[0] == 0) {
                $pdo->exec("insert into `options` (`description`,`subject_id`) values ('{$des}','{$_POST['subject_id']}')");
            }
        }
    }
}

header("location:../backend.php");
