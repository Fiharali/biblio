<?php

include '../partials/navbar.php';

// echo $_GET['id'];
require  __DIR__ . '/../../../vendor/autoload.php';

use app\controller\BookController;

// session_start();

if (isset($_GET['id'])) {
    $books = new BookController();
    $book = $books->editBook($_GET['id']);
}

?>

<section class="page-section " id="about" style="background-color: #C66D28;">
    <div class="row p-5">
        <div class="col-md-6 col-sm-12">
            <div class="col mb-5">
                <div class="card h-100">
                    <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale
                    </div>
                    <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                </div>
            </div>
        </div>
        <?php
        if (isset($_GET['id'])) {


        ?>
            <div class="col-md-6 col-sm-12">
                <div class="col mb-5">
                    <h1><?= $book->title ?> </h1>
                    <h4 class="badge bg-secondary mt-3"><?= $book->author ?></h4><br>
                    <h6 class="badge bg-primary mt-4"><?= $book->genre ?></h6>
                    <h6 class="badge bg-primary mt-4"><?= $book->publication_year ?></h6>
                    <h6 class="badge bg-warning "><?= $book->available_copies ?></h6>
                    <br>
                    <p class="mt-2"><?= $book->description ?></p><br>
                    <?php
                    if (isset($_SESSION['username'])) {
                    ?>
                        <form method='post' action="../../../app/controller/ReservationController.php">
                            <input type='hidden' class="form-control w-50 bg-dark text-light" value="<?=$_GET['id']?>" name="book_id" /> <br>
                            <input type='hidden' class="form-control w-50 bg-dark text-light" value="<?=$_SESSION['id']?>" name="user_id" /> <br>
                            <input type='date' class="form-control w-50 bg-dark text-light"  min="<?php echo date('Y-m-d'); ?>" max="<?php echo date('Y-m-d', strtotime('+15 days')); ?>"  value="<?php echo date('Y-m-d', strtotime('+15 days')); ?>" name="return_date" /> <br>
                            <!-- <textarea class="bg-dark text-light " row=30 cols="34" name="description"></textarea><br> -->
                            <input type='submit' class="mt-3 p-2 px-4 bg-dark text-light" value="reserve"  name="reserve"  <?= $book->available_copies > 0 ? '':'disabled' ?>  /> 
                        </form>
                    <?php
                    }else{
                        echo "<a href='../../auth/login.php' class='btn btn-outline-info ' role='button'>Login to make a res</a>";
                    }
                    ?>
                </div>
            </div>
        <?php


        }
        ?>
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


<?php

include '../partials/footer.php'
?>