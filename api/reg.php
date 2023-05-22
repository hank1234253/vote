<?php
include_once "../db.php";
$pw=md5($_POST['pw']);
if(!empty($_POST)&&$_POST['acc']!=''&&$_POST['pw']!=''){
    $pdo->exec("insert into `members`(`acc`,`pw`,`name`,`addr`,`email`) 
                             values ('{$_POST['acc']}',
                                    '{$pw}',
                                    '{$_POST['name']}',
                                    '{$_POST['addr']}',
                                    '{$_POST['email']}')");
    header("location:../index.php");
}else{
    header("location:../index.php?do=reg&error=1");
}
?>