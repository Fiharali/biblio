<?php



namespace app\model;
// use app\model\Book;

include __DIR__ . '/../../vendor/autoload.php';

use app\connection\Connection;

use PDO;

// `title`, `author`, `genre`, `description`, `publication_year`, `total_copies`, `available_copies`
class Book
{

    private $db;
    private $id;
    private $title;
    private $author;
    private $genre;
    private $description;
    private $publication_year;
    private $total_copies;
    private $available_copies;

    public function __construct($id,$title,$author,$genre,$description,$publication_year,$total_copies,$available_copies)
    {
        $this->db = Connection::connection();
        $this->id = $id;
        $this->title = $title;
        $this->author = $author;
        $this->genre = $genre;
        $this->description = $description;
        $this->publication_year = $publication_year;
        $this->total_copies = $total_copies;
        $this->available_copies = $available_copies;
    }



    public function getId() {
        return $this->id;
    }


    public function getTitle() {
        return $this->title;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function getAuthor() {
        return $this->author;
    }

    public function setAuthor($author) {
        $this->author = $author;
    }

    public function getGenre() {
        return $this->genre;
    }

    public function setGenre($genre) {
        $this->genre = $genre;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function getPublicationYear() {
        return $this->publication_year;
    }

    public function setPublicationYear($publication_year) {
        $this->publication_year = $publication_year;
    }

    public function getTotalCopies() {
        return $this->total_copies;
    }

    public function setTotalCopies($total_copies) {
        $this->total_copies = $total_copies;
    }

    public function getAvailableCopies() {
        return $this->available_copies;
    }

    public function setAvailableCopies($available_copies) {
        $this->available_copies = $available_copies;
    }


    

    public function getAllBooks()
    {
        $stmt = $this->db->prepare("SELECT * FROM books");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);

        $books = [];
        foreach ($result as $bookData) {
            $book_instance = new Book($bookData->id,$bookData->title,$bookData->author,$bookData->genre,$bookData->description,$bookData->publication_year,$bookData->total_copies,$bookData->available_copies);
            $books[] = $book_instance;
        }

        return $books;
    }

    public function add()
    {
        $stmt = $this->db->prepare("INSERT INTO  books VALUES (null,?,?,?,?,?,?,?) ");
        $stmt->execute([$this->title,$this->author,$this->genre,$this->description,$this->publication_year,$this->total_copies,$this->available_copies]);
    }

    public function edit()
    {
        $stmt = $this->db->prepare("select *  from books where id = ?");
        $stmt->execute([$this->id]);
        $result = $stmt->fetch(PDO::FETCH_OBJ);
        return $result;
    }


    public function update()
    {
        $stmt = $this->db->prepare("UPDATE books SET title=?,author=?,genre=?,description=?,publication_year=?,total_copies=?,available_copies=? where id = ?");
        $stmt->execute([$this->title,$this->author,$this->genre,$this->description,$this->publication_year,$this->total_copies,$this->available_copies,$this->id]);
    }

    public function delete()
    {
        $stmt = $this->db->prepare("delete from books where id = ?");
        $stmt->execute([$this->id]);
    }
}


// $user= new User("ali","email","password");