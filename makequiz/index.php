<?php
    session_start();
    if(!isset($_SESSION['login'])){
        $_SESSION['pesan'] = "belum login";
        header("location:../quizMaker.php");
    }
    $username = $_SESSION['username'];
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Dashboard Template · Bootstrap v5.0</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">

    

    <!-- Bootstrap core CSS -->
<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
        font-size: 3.5rem;
        }
    }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
</head>
<body>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Make Quiz</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
        </div>
        <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            This week
        </button>
        </div>
    </div>

    <!-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> -->

    <!-- <h2>Section title</h2> -->
    <?php 
        if (isset($_SESSION['isavaiable'])) {
            if (!$_SESSION['isavaiable']) {
                ?>          
                <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading">Success!</h4>
                    <p>Your quiz has been inserted</p>
                </div>
                <?php
            }else {
                ?>             
                <div class="alert alert-danger" role="alert">
                    <h4 class="alert-heading">Sorry!</h4>
                    <p>Your quiz is avaiable</p>
                </div>
                <?php
            }
            unset($_SESSION['isavaiable']);
            unset($_SESSION['name']);
        }
    ?>
    <form action="makequiz/addquiz.php" method="post">
        <div class="bd-example">
            <input class=" mb-3 form-control form-control-sm" type="text" placeholder="Enter new quiz name" name="quizname" required>
            <button class="btn btn-primary" type="submit">Create new quiz</button>
        </div>
    </form>
    <hr>

    <?php 
        include 'koneksi.php';
        $data = mysqli_query($koneksi, "SELECT * FROM `quizes`");
        while ($d = mysqli_fetch_array($data)) {
            $no = 1;
            ?>  
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h3><?php echo $d['name'] ?></h3>
                <form action="makequiz/deletequiz.php" method="post">
                    <input type="hidden" name="name" value="<?php echo $d['name'] ?>">
                    <button class="btn alert-danger" name="delete" type="submit">delete</button>  
                </form>               
            </div>
            
            <?php 
                $username = $_SESSION['username'];
                $name =  $d['name'];
                $items = mysqli_query($quizitem, "SELECT * FROM ".$name.$username);
                while ($e = mysqli_fetch_array($items)) {
                    ?>                     
                    <div class="card">
                        <div class="card-header">
                            <?php echo $no ?>
                        </div>
                        <form action="makequiz/updateitem.php" method="post">
                            <div class="card-body">
                                <table width="100%">
                                    <tr>
                                        <td><h5 class="card-title">Question</h5></td>
                                        <td><input class=" mb-3 form-control form-control-sm" type="text" placeholder="Enter new question" name="question" value="<?php echo $e['question'] ?>" required></td>
                                    </tr>
                                    <tr>
                                        <td><h6>Answer</h6></td>
                                        <td><input class=" mb-3 form-control form-control-sm" type="text" placeholder="Enter the answer" name="answer" value="<?php echo $e['answer'] ?>" required></td>
                                    </tr>
                                    <tr>
                                        <td>Wrong1</td>
                                        <td><input class=" mb-3 form-control form-control-sm" type="text" placeholder="Enter wrong answer" name="wrong1"  value="<?php echo $e['wanswer1'] ?>" required></td>
                                    </tr>
                                    <tr>
                                        <td>Wrong2</td>
                                        <td><input class=" mb-3 form-control form-control-sm" type="text" placeholder="Enter another wrong answer" name="wrong2"  value="<?php echo $e['wanswer2'] ?>" required></td>
                                    </tr>
                                </table>
                                <input type="hidden" name="number" value="<?php echo $no++ ?>">
                                <input type="hidden" name="name" value="<?php echo $d['name'] ?>">
                                <input class="btn btn-primary" type="submit" name="update" value="Update item">
                            </div>
                        </form>
                    </div>
                    <br>

                    <?php
                }
            if ($no <= 25) {
                ?> 
                <div class="card">
                    <div class="card-header">
                        <?php echo $no++ ?>
                    </div>
                    <form action="makequiz/additem.php" method="post">
                        <div class="card-body">
                            <table width="100%">
                                <tr>
                                    <td><h5 class="card-title">Question</h5></td>
                                    <td><input class=" mb-3 form-control form-control-sm" type="text" placeholder="Enter new question" name="question" required></td>
                                </tr>
                                <tr>
                                    <td><h6>Answer</h6></td>
                                    <td><input class=" mb-3 form-control form-control-sm" type="text" placeholder="Enter the answer" name="answer" required></td>
                                </tr>
                                <tr>
                                    <td>Wrong1</td>
                                    <td><input class=" mb-3 form-control form-control-sm" type="text" placeholder="Enter wrong answer" name="wrong1" required></td>
                                </tr>
                                <tr>
                                    <td>Wrong2</td>
                                    <td><input class=" mb-3 form-control form-control-sm" type="text" placeholder="Enter another wrong answer" name="wrong2" required></td>
                                </tr>
                            </table>
                            <input type="hidden" name="name" value="<?php echo $d['name'] ?>">
                            <input class="btn btn-primary" type="submit" name="add" value="Add item">
                        </div>
                    </form>
                </div>
                <hr>                 
                <?php
                $no = 1;
            }
        }
    ?>


    <!-- <div class="table-responsive">
        <table class="table table-striped table-sm">
        <thead>
            <tr>
            <th scope="col">Number</th>
            <th scope="col">Questions</th>
            <th scope="col"></th>
            <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>test</th>
                <th>test</th>
                <th>test</th>
                <th>test</th>
            </tr>
        </tbody>
        </table>
    </div> -->
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
    <script>
        $(document).ready(function() {
            $("button").click(function() {
                $(document).scrollTop($(document).height());
            });
        });
    </script>
</body>
</html>
