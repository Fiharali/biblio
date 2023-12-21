<?php
// include  __DIR__ . '/../partials/navbar.php';
// include  __DIR__ . '/../../../app/controller/bookController.php';
include  __DIR__ . '/../../../vendor/autoload.php';

use app\controller\BookController;
// session_start();
$bookController = new BookController();
$books = $bookController->AllBooks();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>SmartLibra</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="../../../public/assets/favicon.ico" />
    <!-- Bootstrap Icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
    <!-- SimpleLightbox plugin CSS-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="../../../public/css/styleshome.css" rel="stylesheet" />
    <!-- Bootstrap JS Bundle (Popper included) -->




    <style>
        #portfolio .portfolio-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#page-top">SmartLibra</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto my-2 my-lg-0">
                    <!-- <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#services">Services</a></li> -->


                    <?php
                    if (isset($_SESSION["username"])) {
                        if ($_SESSION["isAdmin"]) {
                    ?>
                            <li class="nav-item"><a class="nav-link" href="#portfolio" style="color: #C66D28;">Dashboard</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="#contact" style="color: #C66D28;">Profile</a></li>
                            <li class="nav-item"><a class="nav-link" href="../../../app/controller/logout.php" style="color: #C66D28;">LogOut</a></li>
                        <?php
                        } else {
                        ?>
                            <li class="nav-item"><a class="nav-link" href="#portfolio" style="color: #C66D28;">Profile</a></li>
                            <li class="nav-item"><a class="nav-link" href="../../../app/controller/logout.php" style="color: #C66D28;">LogOut</a>
                            </li>
                        <?php
                        }
                    } else {
                        ?>
                        <li class="nav-item"><a class="nav-link" href="#portfolio" style="color: #C66D28;">Register</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contact" style="color: #C66D28;">log in</a></li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
        <!-- card shop -->
       
    </nav>

    <!-- Button trigger modal -->