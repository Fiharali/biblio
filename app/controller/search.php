<?php




namespace app\model;
// use app\model\Book;

include __DIR__ . '/../../vendor/autoload.php';

use app\connection\Connection;
use PDO;

$stmt = Connection::connection()->prepare("SELECT * FROM books WHERE title LIKE ?");
$searchTerm = '%' . $_GET['searchBook'] . '%';
$stmt->execute([$searchTerm]);
echo $result;

