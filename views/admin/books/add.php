<?php
session_start();
include '../partials/navbar.php';



?>
<div class=" sm:ml-64 mt-10">


    <div class="relative overflow-x-auto shadow-md sm:rounded-lg ">


        <div class="max-w-2xl px-4 py-1 mx-auto lg:py-16">
            <form method="post" id="submitForm" action="../../../app/controller/bookController.php">
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2">
                        <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Name
                        </label>
                        <input type="text" name="title" value="" id="title"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder=" Title">
                    </div>
                    <div class="sm:col-span-2">
                        <label for="author" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Author </label>
                        <input type="text" name="author" value="" id="author"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="author">
                    </div>
                    <div class="sm:col-span-2">
                        <label for="genre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Genre </label>
                        <input type="text" name="genre" value="" id="genre"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="genre">
                    </div>
                    <div class="sm:col-span-2">
                        <label for="publication_year"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Publication year </label>
                        <input type="date" name="publication_year" value="" id="publication_year"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="publication_year">
                    </div>
                    <div class="sm:col-span-2">
                        <label for="total_copies" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Total copies </label>
                        <input type="number" name="total_copies" value="" id="total_copies"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="total_copies">
                    </div>
                    <div class="sm:col-span-2">
                        <label for="available_copies"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Available copies </label>
                        <input type="number" name="available_copies" value="" id="available_copies"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="available_copies">
                    </div>
                    <div class="sm:col-span-2">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Description </label>
                        <textarea name="description" value="" id="description"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="description"></textarea>
                    </div>

                    <div class="mt-12 sm:col-span-2">
                        <input type="submit" name="addBook"
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