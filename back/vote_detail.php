<?php
$sub_id=$_GET['sub_id'];
$log_id=$_GET['log_id'];
$subject =$pdo->query("select `subject` from `topics` where `id`='{$sub_id}'")->fetchColumn();
?>
<h1>投票主題</h1>
<h2><?=$subject?></h2>