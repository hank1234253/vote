<?php include_once "db.php";?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>管理後台</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
<header>
    <a href="index.php">首頁</a>
    <a href="login.php">登出</a>
<nav>
    <a href='?do=add_vote'>新增投票</a>
    <a href='./back/query_vote.php'>結果查詢</a>
</nav>
</header>
<main>
<?php
$do=$_GET['do']??"topic_list";
$file="./back/".$do.".php";
    include (file_exists($file))?$file:"./back/topic_list.php";

    // if(file_exists($file)){
    //     include($file);
    // }
    // else{
    //     include("./back/topic_list.php");
    // }

    
?>
</main>
<footer></footer>
</body>
</html>