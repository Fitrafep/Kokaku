<?php
    session_start();
    if(!isset($_SESSION['login'])){
        $_SESSION['pesan'] = "belum login";
        header("location:quizMaker.php");
    }
    $_SESSION['admin'] = 'waitingroom';
    include 'enabledmenus.php';
    header("location:../admin.php");
?>