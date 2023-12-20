<?php
// include  __DIR__ . '/../partials/navbar.php';
include  __DIR__ . '/../../../app/controller/bookController.php';
include  __DIR__ . '/../../../vendor/autoload.php';
use app\controller\BookController;
// session_start();
$bookController=new BookController();
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
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic"
        rel="stylesheet" type="text/css" />
    <!-- SimpleLightbox plugin CSS-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../../../public/css/styleshome.css" rel="stylesheet" />
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
            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

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
                    <li class="nav-item"><a class="nav-link" href="../../../app/controller/logout.php"
                            style="color: #C66D28;">LogOut</a></li>
                    <?php
                        } else {
                        ?>
                    <li class="nav-item"><a class="nav-link" href="#portfolio" style="color: #C66D28;">Profile</a></li>
                    <li class="nav-item"><a class="nav-link" href="../../../app/controller/logout.php"
                            style="color: #C66D28;">LogOut</a>
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
    </nav>
    <!-- Masthead-->
    <header class="masthead">
        <div class="container px-4 px-lg-5 h-100">
            <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                <div class="col-lg-8 align-self-end">
                    <h1 class="text-white font-weight-bold"> SmartLibra </h1>
                    <hr class="divider" />
                </div>
                <div class="col-lg-8 align-self-baseline">
                    <p class="text-white-75 mb-5">Explore, customize, and embark on a journey to create a digital haven
                        for literature lovers!</p>
                    <a class="btn btn-primary btn-xl" href="#about" style="background-color: #C66D28;">Find Out More</a>
                </div>
            </div>
        </div>
    </header>
    <!-- About-->
    <section class="page-section " id="about" style="background-color: #C66D28;">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="text-white mt-0">We've got what you need!</h2>
                    <hr class="divider divider-light" />
                    <p class="text-white-75 mb-4"> Dive into our curated collection of literary treasures—bestsellers,
                        classics, and hidden gems await. Ready to embark on your next reading adventure? Reserve or buy
                        your favorite book today and let the pages transport you to new worlds!</p>
                    <a class="btn btn-light btn-xl" href="#services">Get Started!</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Services-->
    <section class="page-section" id="services">
        <div class="container px-4 px-lg-5">
            <h2 class="text-center mt-0">At Your Service</h2>
            <hr class="divider" />
            <div class="row gx-4 gx-lg-5">
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <div class="mb-2"><i class="bi-gem fs-1 text-primary"></i></div>
                        <h3 class="h4 mb-2">Sturdy Themes</h3>
                        <p class="text-muted mb-0"></p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <div class="mb-2"><i class="bi-laptop fs-1 text-primary"></i></div>
                        <h3 class="h4 mb-2">Up to Date</h3>
                        <p class="text-muted mb-0"></p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <div class="mb-2"><i class="bi-globe fs-1 text-primary"></i></div>
                        <h3 class="h4 mb-2">Ready to Publish</h3>
                        <p class="text-muted mb-0"></p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <div class="mb-2"><i class="bi-heart fs-1 text-primary"></i></div>
                        <h3 class="h4 mb-2">Made with Love</h3>
                        <p class="text-muted mb-0"></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Portfolio-->
    <div id="portfolio">
        <div class="container-fluid p-0">
            <div class="row g-0">
                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box" href="../../../public/assets/img/books/book1.jpg" title="Project Name">
                        <img class="img-fluid" src="../../../public/assets/img/books/book1.jpg" alt="..." />
                        <div class="portfolio-box-caption">
                            <div class="project-category text-white-50">crime</div>
                            <div class="project-name">One of us is lying</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box" href="../../../public/assets/img/books/book2.jpg" title="Project Name">
                        <img class="img-fluid" src="../../../public/assets/img/books/book2.jpg" alt="..." />
                        <div class="portfolio-box-caption">
                            <div class="project-category text-white-50">Adult crime</div>
                            <div class="project-name"> A Good Girl's Guide to Murder Series </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box" href="../../../public/assets/img/books/book3.jpg" title="Project Name">
                        <img class="img-fluid" src="../../../public/assets/img/books/book3.jpg" alt="..." />
                        <div class="portfolio-box-caption">
                            <div class="project-category text-white-50">Romance</div>
                            <div class="project-name">Girl in pieces</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box" href="../../../public/assets/img/books/book4.jpg" title="Project Name">
                        <img class="img-fluid" src="../../../public/assets/img/books/book4.jpg" alt="..." />
                        <div class="portfolio-box-caption">
                            <div class="project-category text-white-50">Romance</div>
                            <div class="project-name">Ugly love</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box" href="../../../public/assets/img/books/book5.jpg" title="Project Name">
                        <img class="img-fluid" src="../../../public/assets/img/books/book5.jpg" alt="..." />
                        <div class="portfolio-box-caption">
                            <div class="project-category text-white-50">Romance</div>
                            <div class="project-name">November 9</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box" href="../../../public/assets/img/books/book6.jpg" title="Project Name">
                        <img class="img-fluid" src="../../../public/assets/img/books/book6.jpg" alt="..." />
                        <div class="portfolio-box-caption p-3">
                            <div class="project-category text-white-50">Dark romance </div>
                            <div class="project-name">Verity</div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Call to action-->
    <section class="page-section bg-dark text-white">
        <div class="container px-4 px-lg-5 text-center">
            <h2 class="mb-4">60% OFF !</h2>
            <a class="btn btn-light btn-xl" href="https://startbootstrap.com/theme/creative/">Shop Now!</a>
        </div>
    </section>
    <!-- Contact-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

                <?php
                foreach ($books as $book) {
                ?>
                <div class="col mb-5">
                    <div class="card h-100">
                        <!-- Sale badge-->
                        <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale
                        </div>
                        <!-- Product image-->
                        <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder"> <?= $book->getTitle() ?></h5>
                                <!-- Product reviews-->
                                <div class="d-flex justify-content-center small text-warning mb-2">
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                </div>
                                <!-- Product price-->
                                <span class=""> <?= $book->getGenre() ?></span><br>
                                <span class=""> """<?= $book->getAuthor() ?>"""</span><br>
                                <span class="badge text-bg-warning"> <?= $book->getAvailableCopies() ?></span>

                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php  } ?>
            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="bg-light py-5">
        <div class="container px-4 px-lg-5">
            <div class="small text-center text-muted">Copyright &copy; 2023 - SmartLibra</div>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- SimpleLightbox plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
    <!-- Core theme JS-->
    <script src="../../../public/js/scriptshome.js"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>