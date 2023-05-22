    <?php
    $sql = "select * from `topics` where `id`='{$_GET['id']}'";
    $row = $pdo->query($sql)->fetch();
    ?>
    <h3>你確定要刪除以下這個投票主題及相關的資料嗎?</h3>
    <div><?= $row['subject']; ?></div>

    <div>
        <button onclick="location.href='./api/del_vote.php?id=<?= $_GET['id']; ?>'">確定刪除</button>
        <button onclick="location.href='./backend.php'">取消</button>
    </div>
