<?php
    session_start();
    include_once 'pages/functions.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Trips</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
</head>
<body>
    <div class="container">
        <?php connect() ?>
        <div class="row">
            <header class="col-md-12"></header>
        </div>
        <div class="row">
            <nav class="col-md-12">
                <?php include_once 'pages/menu.php'?>
            </nav>
        </div>
        <div class="row">
            <section class="col-md-12">
                <?php if(isset($_GET['page'])){
                    $page = $_GET['page'];
                    if($page == 1){
                        include_once 'pages/tours.php';
                    }
                    else if($page == 2){
                        include_once 'pages/comments.php';
                    }
                    else if($page == 3){
                        include_once 'pages/registration.php';
                    }
                    else if($page == 4){
                        include_once 'pages/admin.php';
                    }
                    else{
                        include_once 'pages/error404.php';
                    }
                }
                else{
                    include_once 'pages/tours.php';
                }
                ?>
            </section>
        </div>
        <div class="footer">NickUsov, company Step &copy; 2019</div>
    </div>
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>