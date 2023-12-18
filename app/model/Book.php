<?php



namespace app\model;

include __DIR__ . '/../../vendor/autoload.php';

use app\connection\Connection;

use PDO;

// `title`, `author`, `genre`, `description`, `publication_year`, `total_copies`, `available_copies`
class Book
{

    private $db;
    private $title;
    private $author;
    private $genre;
    private $description;
    private $publication_year;
    private $total_copies;
    private $available_copies;

    public function __construct($title,$author,$genre,$description,$publication_year,$total_copies,$available_copies)
    {
        $this->db = Connection::connection();
        $this->title = $title;
        $this->author = $author;
        $this->genre = $genre;
        $this->description = $description;
        $this->publication_year = $publication_year;
        $this->total_copies = $total_copies;
        $this->available_copies = $available_copies;
    }

    public function getAllBooks()
    {

        $stmt = $this->db->prepare("select * from  books  ");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public function add()
    {
        $stmt = $this->db->prepare("INSERT INTO  books VALUES (null,?,?,?,?,?,?,?) ");
        $stmt->execute([$this->title,$this->author,$this->genre,$this->description,$this->publication_year,$this->total_copies,$this->available_copies]);
        // $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        // return $result;
    }
}


// $user= new User("ali","email","password");