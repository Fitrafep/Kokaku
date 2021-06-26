<?php
  session_start();
  include 'koneksi.php';
  if (isset($_SESSION['login'])) {
    header("location:../dashboard/index.php");
  }
?>
<!doctype html>
<html>
<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Kokaku</title>
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <link href='styles.css' rel='stylesheet'>
</head>
<body class='snippet-body'>
<div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto">
<div class="card card0 border-0">
    <div class="row d-flex">
        <div class="col-lg-6">
            <div class="card1 pb-5">
                <div class="row"> <img src="https://i.imgur.com/CXQmsmF.png" class="logo"> </div>
                <div class="row px-3 justify-content-center mt-4 mb-5 border-line"> <img src="https://i.imgur.com/uNGdWHi.png" class="image"> </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card2 card border-0 px-4 py-5">

                <!-- register form -->
                <form action="registered.php" method="get">
                    <div class="row px-3"> <label class="mb-1">
                            <h6 class="mb-0 text-sm">Username</h6>
                        </label> <input class="mb-4" type="text" name="name" placeholder="Enter an username" required> </div>
                    <div class="row px-3"> <label class="mb-1">
                            <h6 class="mb-0 text-sm">Password</h6>
                        </label> <input type="password" name="password" placeholder="Enter password" required> </div>
                    <!-- <div class="row px-3 mb-4">
                        <div class="custom-control custom-checkbox custom-control-inline"> <input id="chk1" type="checkbox" name="chk" class="custom-control-input"> <label for="chk1" class="custom-control-label text-sm">Remember me</label> </div> <a href="#" class="ml-auto mb-0 text-sm">Forgot Password?</a>
                    </div> -->
                    <div class="row px-3"> <small class="font-weight-bold">Already have an account? <a class="text-danger " href="quizMaker.php">Login</a></small> </div>
                    <div class="row mb-4 px-3"> <small class="font-weight-bold">Join as <a class="text-danger " href="index.php">Participant</a></small> </div>
                    <div class="row mb-3 px-3"> <button type="submit" class="btn btn-blue text-center">Register</button> </div>
                </form>
            </div>
        </div>
    </div>
    <div class="bg-blue py-4">
        <div class="row px-3"> <small class="ml-4 ml-sm-5 mb-2">Copyright &copy; 2021. All rights reserved.</small>
            <!-- <div class="social-contact ml-4 ml-sm-auto"> <span class="fa fa-facebook mr-4 text-sm"></span> <span class="fa fa-google-plus mr-4 text-sm"></span> <span class="fa fa-linkedin mr-4 text-sm"></span> <span class="fa fa-twitter mr-4 mr-sm-5 text-sm"></span> </div> -->
        </div>
    </div>
</div>
</div>
    <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js'></script>
</body>
</html>