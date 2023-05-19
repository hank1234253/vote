<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <?php
    include_once "../db.php";
    $sql = "select * from `topics` where `id`='{$_GET['id']}'";
    $row = $pdo->query($sql)->fetch();
    ?>
    <h3>你確定要刪除以下這個投票主題及相關的資料嗎?</h3>
    <div><?= $row['subject']; ?></div>

    <div>
        <button onclick="location.href='../api/del_vote.php?id=<?= $_GET['id']; ?>'">確定刪除</button>
        <button onclick="location.href='../backend.php'">取消</button>
    </div>
</body>

</html>