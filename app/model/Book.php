<?php



namespace app\model;

include __DIR__ . '/../../vendor/autoload.php';

use app\connection\Connection;

use PDO;


class Book
{

    private $db;
    private $name;
    private $email;
    private $password;

    public function __construct($name, $email, $password)
    {
        $this->db = Connection::connection();
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    public function getAllBooks()
    {

        $stmt = $this->db->prepare("select * from  books  ");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
}


// $user= new User("ali","email","password");