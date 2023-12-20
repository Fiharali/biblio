<?php



namespace app\model;

include __DIR__ . '/../../vendor/autoload.php';

use app\connection\Connection;

use PDO;


class Reservation
{

    private $db;
    private $description;
    private $reservation_date;
    private $return_date;
    private $user_id;
    private $book_id;

    public function __construct($description, $reservation_date, $return_date, $user_id, $book_id)
    {
        $this->db = Connection::connection();
        $this->description = $description;
        $this->reservation_date = $reservation_date;
        $this->return_date = $return_date;
        $this->user_id = $user_id;
        $this->book_id = $book_id;
    }
 

    public function createReservation()
    {
        $stmt = $this->db->prepare("INSERT INTO reservations( description, reservation_date, return_date, is_returned, user_id, book_id) VALUES (?, ?, ?,0, ?, ?)");
        $stmt->execute([$this->description, $this->reservation_date, $this->return_date, $this->user_id, $this->book_id]);

       
    }

    public function getAllReservation()
    {

        $stmt = $this->db->prepare("select * from  reservation  ");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
}


// $user= new User("ali","email","password");