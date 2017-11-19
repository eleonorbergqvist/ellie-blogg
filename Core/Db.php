<?php
namespace Core;

use \PDO;

class Db {
    private static $instance;
    private $pdo;

    protected function __construct($servername, $username, $password, $db)
    {
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

    public function execute($sql) {
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        return $statement;
    }    

    public function query($sql) {
        $statement = $this->execute($sql);
        return $statement->fetchAll();
    }

    public function lastInsertId() {
        return $this->pdo->lastInsertId();
    }

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new static(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_DB);
        }
        return self::$instance;
    }
}

?>