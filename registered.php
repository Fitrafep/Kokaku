<?php
    session_start();
    include 'koneksi.php';
    if (isset($_SESSION['login'])) {
      header("location:../dashboard/index.php");
    }

    $name = $_REQUEST['name'];
    $password = $_REQUEST['password'];

    mysqli_query($koneksi, "insert into quizOperator values('$name','$password')");
?>