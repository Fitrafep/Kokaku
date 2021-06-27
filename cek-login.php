<?php
    session_start();
    include 'koneksi.php';
    if (isset($_REQUEST['login'])) {
        $username = $_REQUEST['username'];
        $password = $_REQUEST['password'];
        $data = mysqli_query($koneksi, "SELECT * FROM quizOperator where username = '$username' and password = '$password'");
        $cek = mysqli_num_rows($data);
        if($cek > 0){
            $_SESSION['username'] = $username;
            $_SESSION['login'] = "login";
            header("location:menus/dashboard.php");
        }else{
            $_SESSION['pesan'] = "gagal";
            header("location:quizMaker.php");
        }
    }else {
        header("location:quizMaker.php");
    }


    
?>