<?php
    session_start();
    if(!isset($_SESSION['login'])){
        $_SESSION['pesan'] = "belum login";
        header("location:quizMaker.php");
    }
    $_SESSION['dashboard'] = "class='nav-link'";
    $_SESSION['makequiz'] = "class='nav-link'";
    $_SESSION[$_SESSION['admin']] = "class='nav-link active' aria-current='page'";
    
?>