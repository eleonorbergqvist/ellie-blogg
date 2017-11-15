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

    function getUrl() {
        return '/postdetail/'.$this->getField('id');
    }

    static function get ($id) {
        $rows = Db::getInstance()->query("SELECT * FROM posts WHERE id=$id");
        $row = $rows[0];

        return new Post($row);
    }

    static function getFiltered($offset, $limit) {
        $rows = Db::getInstance()->query("SELECT * FROM posts LIMIT $offset,$limit");

        foreach ($rows as $row) {
            $models[] = new Post($row);
        }
        
        return $models;
    }

    static function getLatest() {
        $rows = Db::getInstance()->query("SELECT * FROM posts ORDER BY id DESC LIMIT 1");
        $row = $rows[0];

        return new Post($row);
    }
}

?>