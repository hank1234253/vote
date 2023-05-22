<?php include_once("db.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>驚奇投票所</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
<header>
    <a href="index.php">首頁</a>
    <a href="?do=result_list">結果</a>
    <?php
        if(!isset($_SESSION['login'])){
    ?>
    <a href="?do=login">登入</a>
    <a href="?do=reg">註冊</a>
    <?php
    }else{
    ?>
    <a href="./api/logout.php">登出</a>
    <?php
    }
    ?>
</header>
<main>
   <?php
   $do=$_GET['do']??"list";
   $file="./front/".$do.".php";
       include (file_exists($file))?$file:"./front/list.php";
   ?>
</main>
<footer></footer>

</body>
</html>