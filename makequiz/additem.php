<?php 
    session_start();
    include '../koneksi.php';
    if(!isset($_SESSION['login'])){
        $_SESSION['pesan'] = "belum login";
        header("location:../quizMaker.php");
    }
    $username = $_SESSION['username'];
    $name =  $_REQUEST['name'];

    $question = $_REQUEST['question'];
    $answer = $_REQUEST['answer'];
    $wrong1 = $_REQUEST['wrong1'];
    $wrong2 = $_REQUEST['wrong2'];

    mysqli_query($quizitem, "INSERT INTO ".$name.$username."(`question`, `answer`, `wanswer1`, `wanswer2`) VALUES ('$question','$answer','$wrong1','$wrong2')");
    header("location:../menus/makequiz.php");
?>