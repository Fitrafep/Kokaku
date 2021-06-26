<?php
    session_start();
    include 'koneksi.php';
    if (isset($_SESSION['login'])) {
        header("location:../dashboard/index.php");
    }
    $registered = true;
    $name = $_REQUEST['name'];
    $password = $_REQUEST['password'];
    $data = mysqli_query($koneksi, "SELECT * FROM quizOperator");
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
                    <?php
                        //cek kesamaan data
                        while ($d = mysqli_fetch_array($data)) {
                            if ($name == $d['username']) {
                                $registered = false;
                            }
                        }

                        if ($registered) {
                            mysqli_query($koneksi, "insert into quizOperator values('$name','$password')");
                            ?>
                            <div class="alert alert-success" role="alert">
                                <h4 class="alert-heading">Well done!</h4>
                                <p>You successfully register. You can create more Quiz.</p>
                                <hr>                                
                                <p class="mb-0"><a href="quizMaker.php">Click here to login</a></p>
                          </div>
                          <?php
                        } else {
                            ?>
                            <div class="alert alert-danger" role="alert">
                                <h4 class="alert-heading">Sorry!</h4>
                                <p>Your data named <?php echo $name?> have been registered.</p>
                                <hr>                                
                                <p class="mb-0"><a href="quizMaker.php">Click here to login</a></p>
                          </div>
                          <?php
                        }
                    ?>
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
