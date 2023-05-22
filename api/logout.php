<?php
    include_once "../db.php";
    unset($_SESSION['login']);
    unset($_SESSION['position']);
    header("location:../index.php");
?>