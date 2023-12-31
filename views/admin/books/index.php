<?php
include  __DIR__ . '/../partials/navbar.php';
// include  __DIR__ . '/../../../app/controller/bookController.php';


include  __DIR__ . '/../../../vendor/autoload.php';

use app\controller\BookController;

$bookController = new BookController();

$books = $bookController->AllBooks();


?>
<div class=" sm:ml-64 mt-10">
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-10 pt-10">
        <div class="flex flex-column sm:flex-row flex-wrap space-y-4 sm:space-y-0 items-center justify-between pb-4">
            <div>
                <button id="dropdownRadioButton" class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button">
                    <svg class="w-3 h-3 text-gray-500 dark:text-gray-400 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm3.982 13.982a1 1 0 0 1-1.414 0l-3.274-3.274A1.012 1.012 0 0 1 9 10V6a1 1 0 0 1 2 0v3.586l2.982 2.982a1 1 0 0 1 0 1.414Z" />
                    </svg>
                    <a href="add.php">Add Book</a>

                </button>

            </div>
            <label for="table-search" class="sr-only">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 rtl:inset-r-0 rtl:right-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <input type="text" id="table-search" class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for items" name="searchBook">
            </div>
        </div>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        id
                    </th>
                    <th scope="col" class="px-6 py-3">
                        title
                    </th>
                    <th scope="col" class="px-6 py-3">
                        author
                    </th>
                    <th scope="col" class="px-6 py-3">
                        genre
                    </th>
                    <th scope="col" class="px-6 py-3 ">
                        total_copies
                    </th>
                    <th scope="col" class="px-6 py-3 ">
                        available_copies
                    </th>
                    <th scope="col" class="px-6 py-3 ">
                        Actions
                    </th>

                </tr>
            </thead>
            <tbody>

                <?php
                foreach ($books as $book) {
                    // var_dump($book->getId());

                ?>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td scope="col" class="px-6 py-3">
                            <?= $book->getId() ?>
                        </td>
                        <td scope="col" class="px-6 py-3">
                            <?= $book->getTitle() ?>
                        </td>
                        <td scope="col" class="px-6 py-3">
                            <?= $book->getAuthor() ?>
                        </td>
                        <td scope="col" class="px-6 py-3">
                            <?= $book->getGenre() ?>
                        </td>
                        <td scope="col" class="px-6 py-3 ">
                            <?= $book->getTotalCopies() ?>
                        </td>
                        <td scope="col" class="px-6 py-3 ">
                            <?= $book->getAvailableCopies() ?>
                        </td>
                        <td scope="col" class="px-6 py-3 flex gap-3">
                            <form method="post" action="../../../app/controller/bookController.php">
                                <input type='hidden' value="<?= $book->getId() ?>" name='id'>
                                <input type='submit' value="Delete" name="deleteBook" class="bg-red-950 p-3">
                            </form>
                            <form class="flex" method="post" action="edit.php">
                                <input type='hidden' value="<?= $book->getId() ?>" name='id'>
                                <input type='submit' value="edit" name="editBook" class="bg-red-950 p-3">
                            </form>
                        </td>
                    </tr>
                <?php  } ?>

            </tbody>
        </table>
    </div>

</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
  $(document).ready(function() {

    $('#table-search').on('input', function() {

        var searchQuery = $(this).val();

        $.ajax({
            url: '../../../app/controller/bookController.php?searchBook=' + searchQuery,
            method: 'GET',
            data: {
                action: 'searchBook', 
                
                searchQuery: searchQuery
            },
            success: function(response) {
                updateTable(response);
            },
            error: function() {
                console.error('Error during AJAX request');
            }
        });
    });

    function updateTable(results) {

        $('tbody').empty();

        if (Array.isArray(results)) {
  
            results.forEach(function(book) {
                var newRow = '<tr>' +
                    '<td>' + book.id + '</td>' +
                    '<td>' + book.title + '</td>' +'</tr>';

                $('tbody').append(newRow);
            });
        } else {
            console.error('Results is not an array:');
        }
        console.log(results)
    }
});

</script>
<?php
include '../partials/footer.php'

?>