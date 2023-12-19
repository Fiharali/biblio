<?php



namespace app\model;

include __DIR__ . '/../../vendor/autoload.php';

use app\connection\Connection;

use PDO;


class User
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
    public function CheckUser()
    {

        $stmt = $this->db->prepare("SELECT users.*,roles.name from users inner JOIN users_role on users.id=users_role.user_id INNER join roles on roles.id=users_role.role_id WHERE email = ? ");
        $stmt->execute([$this->email]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;

        
    }

    public function createUser()
    {
        $stmt = $this->db->prepare("INSERT INTO users(firstName,email,password)  VALUES (?, ?, ?)");
        $stmt->execute([$this->name, $this->email, $this->password]);
       
    }

    public function getAllUsers()
    {

        $stmt = $this->db->prepare("select * from  users  ");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
}


// $user= new User("ali","email","password");