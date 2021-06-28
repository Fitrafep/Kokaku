<?php 
    session_start();
    include '../koneksi.php';
    if(!isset($_SESSION['login'])){
        $_SESSION['pesan'] = "belum login";
        header("location:../quizMaker.php");
    }
    $username = $_SESSION['username'];
    $name =  $_REQUEST['name'];

    mysqli_query($koneksi, "DELETE FROM `quizes` WHERE `name` = '$name'");
    mysqli_query($quizitem, "DROP TABLE ".$name.$username);
    echo $name;
    header("location:../menus/makequiz.php");
?>