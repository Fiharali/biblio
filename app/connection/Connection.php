<?php

namespace app\connection;

// include __DIR__.'/../../vendor/autoload.php';
use PDO;
class Connection
{
    // private $data;

    public static  function connection()
    {
    //   return mysqli_connect('localhost','root','','biblio');
    $conn = new PDO("mysql:host=localhost;dbname=biblio", "root", "");
    return $conn;
    }

}
$data= new connection();

var_dump($data->connection());