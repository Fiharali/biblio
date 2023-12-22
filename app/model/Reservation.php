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

        $stmt2 = $this->db->prepare("update books set available_copies = available_copies-1 where id =?");
        $stmt2->execute([ $this->book_id]);

       
    }

    public function getAllReservation()
    {

        $stmt = $this->db->prepare("SELECT r.* ,u.firstName, b.title,b.id as 'book_id' FROM reservations r INNER join books b on b.id=r.book_id INNER join users u on r.user_id = u.id;");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public function getUserReservation()
    {

        $stmt = $this->db->prepare("select * from  reservations INNER JOIN books on reservations.book_id=books.id  where user_id= ? ");
        $stmt->execute([ $this->user_id]);
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public function returnReservation()
    {

        $stmt2 = $this->db->prepare("update books set available_copies = available_copies+1 where id =?");
        $stmt2->execute([ $this->book_id]);

        $stmt2 = $this->db->prepare("update reservations set is_returned = 1 where id =?");
        $stmt2->execute([ $this->user_id]);

       
    }
}


// $user= new User("ali","email","password");