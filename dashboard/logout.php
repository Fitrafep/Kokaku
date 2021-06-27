<?php
    session_start();
    unset ($_SESSION);
    session_destroy();
    session_start();
    $_SESSION['pesan'] = "logout";
    header("location:../quizMaker.php");
?>