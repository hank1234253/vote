<?php
$id=$_GET['id'];
$options=$pdo->query("select * from `options` where `subject_id`=$id")->fetchAll();
$subject=$pdo->query("select * from `topics` where `id`=$id")->fetch();
?>
<h1>投票結果</h1>
<h2><?=$subject['subject']?></h2>
<ul class="topic-list">
    <li class="list-row">
        <div class="vote-item">序號</div>
        <div class="vote-item">項目</div>
        <div class="vote-item">票數</div>
        <div class="vote-item">操作</div>
    </li>
    <?php
    foreach($options as $idx =>$option){
    ?>
    <li class="list-row">
        <div class="vote-item"><?=$idx+1?>.</div>
        <div class="vote-item"><?=$option['description']?></div>
        <div class="vote-item"><?=$option['total']?></div>
        <div class="vote-item">
            <button onclick="location.href='?do=edit_option&id=<?=$option['id']?>'">編輯</button>
            <button onclick="location.href='./api/del_option.php?id=<?=$option['id']?>'">刪除</button>
        </div>
    </li>
    <?php
    }
    ?>
</ul>