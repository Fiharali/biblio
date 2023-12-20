<?php

namespace app\controller;

include __DIR__ . '/../../vendor/autoload.php';

use app\model\Book;


if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

class BookController
{
    public function AllBooks()
    {
        $allBooks = new Book(null, null, null, null, null, null, null, null);
        return  $allBooks->getAllBooks();
    }

    public function addBooks($title, $author, $genre, $description, $publication_year, $total_copies, $available_copies)
    {


        if (empty($title)) {
            $_SESSION['title'] = "Title is required";
        } elseif (strlen($title) < 3) {
            $_SESSION['title'] = "Title must be at least 3 characters";
        } else {
            $_SESSION['title'] = "";
        }

        if (empty($author)) {
            $_SESSION['author'] = "author is required";
        } elseif (strlen($author) < 3) {
            $_SESSION['author'] = "author must be at least 3 characters";
        } else {
            $_SESSION['author'] = "";
        }
        if (empty($genre)) {
            $_SESSION['genre'] = "Genre is required";
        } elseif (strlen($genre) < 3) {
            $_SESSION['genre'] = "Genre must be at least 3 characters";
        } else {
            $_SESSION['genre'] = "";
        }
        if (empty($description)) {
            $_SESSION['description'] = "description is required";
        } elseif (strlen($description) < 10) {
            $_SESSION['description'] = "description must be at least 10 characters";
        } else {
            $_SESSION['description'] = "";
        }
        if (empty($publication_year)) {
            $_SESSION['publication_year'] = "publication_year is required";
        }
        // } elseif (!filter_var($publication_year, FILTER_VALIDATE_DATE)) {
        //     $_SESSION['publication_year'] = "Invalid publication year format";
        // } 
        else {
            $_SESSION['publication_year'] = "";
        }

        if (empty($total_copies)) {
            $_SESSION['total_copies'] = "total_copies is required";
        } elseif (!filter_var($total_copies, FILTER_VALIDATE_FLOAT)) {
            $_SESSION['total_copies'] = "total_copies must be number ";
        } else {
            $_SESSION['total_copies'] = "";
        }

        if (empty($available_copies)) {
            $_SESSION['available_copies'] = "available_copies is required";
        } elseif (!filter_var($available_copies, FILTER_VALIDATE_FLOAT)) {
            $_SESSION['available_copies'] = "available_copies must be number ";
        } else {
            $_SESSION['available_copies'] = "";
        }



        if (empty($_SESSION["title"]) && empty($_SESSION["author"]) && empty($_SESSION["genre"]) && empty($_SESSION["description"]) && empty($_SESSION["publication_year"]) && empty($_SESSION["total_copies"]) && empty($_SESSION["available_copies"])) {
            $allBooks = new Book(null, $title, $author, $genre, $description, $publication_year, $total_copies, $available_copies);
            $allBooks->add();
            header('location:../../views/admin/books');
        } else {
            header('location:../../views/admin/books/add.php');
        }
    }

    public function editBook($id)
    {
        $allBooks = new Book($id, null, null, null, null, null, null, null);
        return $allBooks->edit();
    }

    public function updateBook($title, $author, $genre, $description, $publication_year, $total_copies, $available_copies,$id)
    {
        $allBooks = new Book($id,$title, $author, $genre, $description, $publication_year, $total_copies, $available_copies);
         $allBooks->update();
    }

    public function deleteBook($id)
    {
        $allBooks = new Book($id, null, null, null, null, null, null, null);
        $allBooks->delete();
    }
}








// $bookController = new BookController();
// $registerController->AllUsers();

if (isset($_POST['addBook'])) {
    extract($_POST);
    $addBook = new BookController();
    $addBook->addBooks($title, $author, $genre, $description, $publication_year, $total_copies, $available_copies);
}

if (isset($_POST['deleteBook'])) {
    extract($_POST);
    $deleteBook = new BookController();
    $deleteBook->deleteBook($id);
    header('location:../../views/admin/books');
}

if (isset($_POST['updateBook'])) {
    extract($_POST);
    $editBook = new BookController();
    $editBook->updateBook($title, $author, $genre, $description, $publication_year, $total_copies, $available_copies,$id);
    header('location:../../views/admin/books');
}