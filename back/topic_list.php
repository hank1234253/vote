<ul class="topic-list">
    <li class="list-row">
        <div class="list-item-title">主題</div>
        <div class="list-item-title">狀態</div>
        <div class="list-item-title">期間</div>
        <div class="list-item-title">投票數</div>
        <div class="list-item-title">操作</div>
    </li>
<?php

    $sql="select *,SUM(`options`.`total`) as sum from `options`,`topics` WHERE `options`.`subject_id` = `topics`.`id` 
    GROUP BY `options`.`subject_id`";
    $rows=$pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    foreach($rows as $row){
?>
    <li class="list-row">
        <div class="list-item"><?=$row['subject'];?></div>
        <div class="list-item">
            <?php
                $now=strtotime('now');
                $open=strtotime($row['open_time']);
                $close=strtotime($row['close_time']);
                if($now<$open){
                    echo "<div class='before'>";
                    echo "未開始";
                    echo "</div>";
                }else if($now<$close){
                    echo "<div class='doing'>";
                    echo "投票中";
                    echo "</div>";
                }else{
                    echo "<div class='finish'>";
                    echo "已結束";
                    echo "</div>";
                }
            ?>
        </div>
        <div class="list-item">
          <?=$row['open_time'] . " <br>至<br> " . $row['close_time'];?>
        </div>
        <div class="list-item"><?=$row["sum"]?></div>
        <div class="list-item">
            <button onclick="location.href='./back/edit_vote.php?id=<?=$row['id']?>'">編輯</button>
            <button onclick="location.href='./back/del_vote.php?id=<?=$row['id']?>'">刪除</button>
            <button onclick="location.href='./api/open.php?id=<?=$row['id']?>'">立即上線</button>
            <button onclick="location.href='./api/close.php?id=<?=$row['id']?>'">立即下架</button>
        </div>
    </li>
<?php
    }
?>
</ul>    


