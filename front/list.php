<ul class="topic-list">
    <li class="list-row">
        <div class="vote-item">序號</div>
        <div class="vote-item" style="text-align:center">主題</div>
        <div class="vote-item">功能</div>
    </li>
    <?php
    date_default_timezone_set("Asia/Taipei");
    $now=date("Y-m-d H:i:s");
    
    $sql = "select * from `topics` where `close_time`>='$now'";
    $rows = $pdo->query($sql)->fetchAll();
    foreach ($rows as $idx => $row) {
    ?>
        <li class="list-row">
            <div class="vote-item"><?= $idx+1 ?>.</div>
            <div class="vote-item"><?= $row['subject'] ?></div>
            <div class="vote-item">
                <button class="type-info">
                    <?php
                    switch ($row['type']) {
                        case 1:
                            echo "單選";
                            break;
                        case 2:
                            echo "多選";
                            break;
                    }
                    ?>
                </button>
                
                    <?php
                        if($row['login']==1){
                            echo "<button class='vip-type'>";
                            echo "會員限定";
                        }else{
                            echo "<button class='normal-type'>";
                            echo "公開";
                        }
                    ?>
                </button>
                <button onclick="location.href='?do=vote&&id=<?= $row['id'] ?>'">我要投票</button>
            </div>
        </li>
    <?php
    }
    ?>
</ul>