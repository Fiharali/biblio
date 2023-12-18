<?php

namespace app\controller;

include __DIR__ . '/../../vendor/autoload.php';

use app\model\Book;




class BookController
{
    public function AllBooks()
    {
        $allBooks = new Book(null, null, null);
        return  $allBooks->getAllBooks();
    }
}








$getAllBooks = new BookController();
// $registerController->AllUsers();