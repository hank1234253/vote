<?php
    include_once "../db.php";
    unset($_SESSION['login']);
    unset($_SESSION['position']);
    unset($_SESSION['pr']);
    header("location:../index.php");
?>