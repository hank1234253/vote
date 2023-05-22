<?php
$subjects=$pdo->query("SELECT `topics`.`id`,
                              `topics`.`subject`,
                              SUM(`options`.`total`) as sum 
                       FROM `options`, `topics` 
                       WHERE `options`.`subject_id` = `topics`.`id` 
                       GROUP BY `options`.`subject_id`")->fetchAll();
?>
<h1>選擇你想要看的投票項目</h1>
<ul class="topic-list">
    <li class="vote-option-title">
        <div class="vote-item">序號</div>
        <div class="vote-item">主題</div>
        <div class="vote-item">票數</div>
    </li>
    <?php
    foreach($subjects as $idx =>$subject){
    ?>
    <li class="list-row">
        <div class="vote-item"><?=$idx+1?>.</div>
        <div class="vote-item"><a href="index.php?do=result&id=<?=$subject['id']?>"><?=$subject['subject']?></a></div>
        <div class="vote-item"><?=$subject['sum']?></div>
    </li>
    <?php
    }
    ?>
</ul>