<?php

namespace app\connection;


include __DIR__.'/../../vendor/autoload.php';
class Connection
{
    // private $data;

    public static  function connection()
    {
      return mysqli_connect('localhost','root','','biblio');
    }

}
$data= new connection();

var_dump($data->connection());