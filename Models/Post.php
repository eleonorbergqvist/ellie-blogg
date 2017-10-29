<?php

namespace Models;
use \Core\Db;

class Post 
{
    private $fields;

    function __construct($fields) {
        $this->fields = $fields;
    }

    function getField($name) {
        return $this->fields[$name];
    }

    static function get ($id) {
        $data = Db::getInstance()->query("SELECT * FROM posts WHERE id=$id");
        return new Post($data);
    }
}

?>