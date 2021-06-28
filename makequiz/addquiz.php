<?php
    session_start();
    include '../koneksi.php';
    if(!isset($_SESSION['login'])){
        $_SESSION['pesan'] = "belum login";
        header("location:../quizMaker.php");
    }
    $username = $_SESSION['username'];
    $name =  $_REQUEST['quizname'];

    //cek kesamaan data
    $_SESSION['isavaiable'] = false;
    $data = mysqli_query($koneksi, "SELECT * FROM `quizes`");
    while ($d = mysqli_fetch_array($data)) {
        echo $d;
        if($name == $d['name']){
            $_SESSION['isavaiable'] = true;
        }
    }

if (!$_SESSION['isavaiable']) {
    mysqli_query($koneksi, "INSERT INTO `quizes`(`name`, `author`) VALUES ('$name','$username')");
    mysqli_query($quizitem,
    "CREATE TABLE ".$name.$username."(
        id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        question TEXT NOT NULL,
        answer TEXT NOT NULL,
        wanswer1 TEXT NOT NULL,
        wanswer2 TEXT NOT NULL
    )");
}   
header("location:../menus/makequiz.php");

?>