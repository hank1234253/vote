<?php
$sub_id=$_GET['sub_id'];
$log_id=$_GET['log_id'];
$subject =$pdo->query("select `subject` from `topics` where `id`='{$sub_id}'")->fetchColumn();
$options=$pdo->query("select * from `options` where `subject_id`='{$sub_id}'")->fetchAll();
$log=$pdo->query("select * from `logs` where `id`='{$log_id}'")->fetch();
$record=unserialize($log['records']);

?>
<h1>投票主題</h1>
<h2><?=$subject?></h2>
<ul>
    <?php
    foreach($options as $opt):
    ?>
    <li>
        <?php
        
        if(in_array($opt['id'],$record)){
            echo "V";
        }
        ?>
        <?=$opt['description']?>
    </li>
    <?php endforeach?>
<ul>