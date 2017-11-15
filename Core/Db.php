<?php
namespace Core;

use \PDO;

class Db {
    private static $instance;
    private $pdo;

    protected function __construct()
    {
        $servername = "localhost";
        $username = "root";
        $password = "root";
        $db = "ellie_blogg";

        try {
            $pdo = new PDO(
                "mysql:host=$servername;dbname=$db", 
                $username, 
                $password, 
                array(
                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
                )
            );
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e) {
            echo $e->getMessage();
        }

        $this->pdo = $pdo;
    }

    public function query($sql) {
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        return $statement->fetchAll();
    }

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new static();
        }
        return self::$instance;
    }
}

?>