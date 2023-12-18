<?php

namespace app\controller;

include __DIR__ . '/../../vendor/autoload.php';

use app\model\Book;




class BookController
{
    public function AllBooks()
    {
        $allBooks = new Book(null, null, null,null,null,null,null);
        return  $allBooks->getAllBooks();
    }

    public function addBooks($title,$author,$genre,$description,$publication_year,$total_copies,$available_copies)
    {
        $allBooks = new Book($title,$author,$genre,$description,$publication_year,$total_copies,$available_copies);
        return  $allBooks->add();
    }
}








$getAllBooks = new BookController();
// $registerController->AllUsers();



if (isset($_POST['addBook'])) {
    extract($_POST);
    $registerController = new BookController();
    $registerController->addBooks($title,$author,$genre,$description,$publication_year,$total_copies,$available_copies);
}