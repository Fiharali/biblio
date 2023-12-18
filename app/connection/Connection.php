<?php

namespace app\connection;

use PDO;
use Dotenv\Dotenv;
require_once __DIR__.'/../../vendor/autoload.php';


$dotenv = Dotenv::createImmutable(__DIR__.'/../../');
$dotenv->load();

class Connection
{
    private static $dbHost;
    private static $dbUser;
    private static $dbPassword;

    public static function init()
    {
        // Access environment variables
        self::$dbHost = $_ENV['DB_HOST'];
        self::$dbUser = $_ENV['DB_USER'];
        self::$dbPassword = $_ENV['DB_PASSWORD'];
    }

    public static function connection()
    {
        self::init();

        $conn = new PDO("mysql:host={$_ENV['DB_HOST']};dbname={$_ENV['DB_NAME']}", $_ENV['DB_USER'], $_ENV['DB_PASSWORD']);
        return $conn;
    }

}

$data= new connection();

var_dump($data->connection());