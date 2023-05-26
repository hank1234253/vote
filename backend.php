<?php 
include_once "db.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>管理後台</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/style.css">
    <script src="./js/jquery-3.7.0.min.js"></script>
</head>
<body>
<header>
    <a href="index.php">首頁</a>
    <a href='?do=add_vote'>新增投票</a>
    <a href="?do=vote_history">投票紀錄</a>
    <a href="./api/logout.php">登出</a>
</header>
<main>
<?php

if(isset($_GET['do'])){
    $do=$_GET['do'];
}else{
    switch($_SESSION['pr']){
        case "super":
            $do="super";
            break;
            case "admin":
                $do="admin";
                break;
                case "member":
                    $do="member";
                    break;
    }
}
$file="./back/".$do.".php";
    include (file_exists($file))?$file:"./back/error.php";

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