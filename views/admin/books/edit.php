<?php

namespace views\admin\books;

session_start();
include '../partials/navbar.php';
require  __DIR__ . '/../../../vendor/autoload.php';

use app\controller\BookController;


if (isset($_POST['id'])) {
    $books = new BookController();
    $book = $books->editBook($_POST['id']);

    // var_dump($book->id);
} else {
    header("location:index.php");
    exit();
}



?>
<div class=" sm:ml-64 mt-10">


    <div class="relative overflow-x-auto shadow-md sm:rounded-lg ">


        <div class="max-w-2xl px-4 py-1 mx-auto lg:py-16">
            <form method="post" id="submitForm" action="../../../app/controller/bookController.php">
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2">
                        <input type="hidden" name="id" value="<?=$book->id?>" id="id">
                        <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            title
                        </label>
                        <input type="text" name="title" value="<?=$book->title?>" id="title"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder=" Title">
                        <span><?= isset($_SESSION['title']) ? $_SESSION['title']  : '';
                                $_SESSION['title'] = ''; ?></span>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="author" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Author </label>
                        <input type="text" name="author" value="<?=$book->author?>" id="author"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="author">
                        <span><?= isset($_SESSION['author']) ? $_SESSION['author']  : '';
                                $_SESSION['author'] = ''; ?></span>

                    </div>
                    <div class="sm:col-span-2">
                        <label for="genre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Genre </label>
                        <input type="text" name="genre" value="<?=$book->genre?>" id="genre"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="genre">
                        <span><?= isset($_SESSION['genre']) ? $_SESSION['genre']  : '';
                                $_SESSION['genre'] = ''; ?></span>

                    </div>
                    <div class="sm:col-span-2">
                        <label for="publication_year"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Publication year </label>
                        <input type="date" name="publication_year" value="<?=$book->publication_year?>"
                            id="publication_year"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="publication_year">
                        <span><?= isset($_SESSION['publication_year']) ? $_SESSION['publication_year']  : '';
                                $_SESSION['publication_year'] = ''; ?></span>

                    </div>
                    <div class="sm:col-span-2">
                        <label for="total_copies" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Total copies </label>
                        <input type="number" name="total_copies" value="<?=$book->total_copies?>" id="total_copies"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="total_copies">
                        <span><?= isset($_SESSION['total_copies']) ? $_SESSION['total_copies']  : '';
                                $_SESSION['total_copies'] = ''; ?></span>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="available_copies"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Available copies </label>
                        <input type="number" name="available_copies" value="<?=$book->available_copies?>"
                            id="available_copies"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="available_copies">
                        <span><?= isset($_SESSION['available_copies']) ? $_SESSION['available_copies']  : '';
                                $_SESSION['available_copies'] = ''; ?></span>

                    </div>
                    <div class="sm:col-span-2">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Description </label>
                        <textarea name="description" id="description"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="description"><?=$book->description?></textarea>
                        <span><?= isset($_SESSION['description']) ? $_SESSION['description']  : '';
                                $_SESSION['description'] = ''; ?></span>
                    </div>

                    <div class="mt-12 sm:col-span-2">
                        <input type="submit" name="updateBook" value="update"
                            class="bg-gray-100 dark:bg-gray-900  border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    </div>
                </div>
            </form>
        </div>

    </div>

</div>

<?php
include '../partials/footer.php'

?>