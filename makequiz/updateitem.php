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
    $no = $_REQUEST['number'];
    $quizname = $name.$username;
    $sql = "UPDATE `{$quizname}` SET `question`='{$question}',`answer`='{$answer}',`wanswer1`='{$wrong1}',`wanswer2`='{$wrong2}' WHERE `id` = '{$no}'";
    $d = mysqli_query($quizitem, $sql);
    header("location:../menus/makequiz.php");
?>