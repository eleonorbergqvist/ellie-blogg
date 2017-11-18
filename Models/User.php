<?php

namespace Models;
use \Core\Db;
        
class User extends Model {

    static function get ($email) {
        $rows = Db::getInstance()->query("SELECT * FROM users WHERE email='$email'");

        if (!count($rows)) {
            throw new \Exception("Error Processing Request", 1);
        }

        $row = $rows[0];
        return new User($row);
    }

       static function getById ($id) {
        $rows = Db::getInstance()->query("SELECT * FROM users WHERE id='$id'");

        if (!count($rows)) {
            throw new \Exception("Error Processing Request", 1);
        }

        $row = $rows[0];
        return new User($row);
    }
}

?>