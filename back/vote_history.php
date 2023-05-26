<h1>投票紀錄</h1>
<?php
$user=$pdo->query("select `id` from `members` where `acc`='{$_SESSION['login']}'")->fetchColumn();
$logs=$pdo->query("select * from `logs` where `mem_id`='{$user}'")->fetchAll();
foreach($logs as $log){
    $topic=$pdo->query("select `id`,`subject` from `topics` where `id`='{$log['topic_id']}'")->fetch();
    
?>
    <div>
        <a href="?do=vote_detail&sub_id=<?=$topic['id']?>&log_id=<?=$log['id']?>">
        <?=$topic["subject"]?>
        </a>
    <?=$log['vote_time']?>
    </div>
<?php
}
?>