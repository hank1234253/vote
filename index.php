<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>驚奇投票所</title>
</head>
<body>
<header>
    <a href="index.php">首頁</a>
    <a href="result.php">結果</a>
    <a href="login.php">登入</a>
    <a href="reg.php">註冊</a>
</header>
<main>
    <ul>
    <?php
    include_once("db.php");
    $sql="select * from `topics` where 1";
    $rows=$pdo->query($sql)->fetchAll();
    foreach($rows as $row){
    ?>
    <li><?=$row['subject']?></li>
    <?php
    }
    ?>
</main>
<footer></footer>

</body>
</html>