<?php
    include_once "../db.php";
    $pw=md5($_POST["pw"]);
    $sql="select count(*) from `members` where `acc`='{$_POST['acc']}'&&`pw`='{$pw}'";
    $chk=$pdo->query($sql)->fetchColumn();
    if($chk>0){
        $_SESSION['login']=$_POST['acc'];
        echo $_SESSION['position'];
        if(isset($_SESSION['position'])){
            header("location:{$_SESSION['position']}");
            exit();
        }
        header("location:../index.php");
    }else{
        header("location:../index.php?do=login&&error=1");
    }
?>