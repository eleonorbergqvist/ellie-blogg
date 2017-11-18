<?php

namespace Models;
use \Core\Db;

class Post extends Model
{
    function getUrl() {
        return '/postdetail/'.$this->getField('id');
    }

    function getCategory() {
        return Category::get($this->getField('category_id'));
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

    static function getCount() {
        $rows = Db::getInstance()->query("SELECT count(id) FROM posts");
        $row = $rows[0][0];

        return $row;
    }
}

?>