<?php
    include_once("../db.php");
    $sql_chk_subject="select count(*) from `topics` where subject='{$_POST['subject']}'";
    $chk=$pdo->query($sql_chk_subject)->fetchColumn();
    if($chk>0){
        echo "已有相同主題";
    }
    else{
        $sql="INSERT INTO `topics` ( `subject`, `open_time`, `close_time`, `type`) 
                        VALUES ('{$_POST['subject']}','{$_POST['open_time']}','{$_POST['close_time']}','{$_POST['type']}')";
        $pdo->exec($sql);

        $sql_subject_id="select `id` from `topics` where `subject`='{$_POST['subject']}'";
        $subject_id=$pdo->query($sql_subject_id)->fetchColumn();
        foreach($_POST['description'] as $desc){
            if($desc!=''){
            $sql="INSERT INTO `options`(`description`,`subject_id`) VALUES ('{$desc}','$subject_id')";
            $pdo->exec($sql);
            }
        }
    }
?>
