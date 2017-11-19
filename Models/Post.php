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

    function getTags() {
        $id = $this->getField('id');
        $sql = "
            SELECT tags.* 
            FROM post_tag 
            LEFT JOIN tags 
                ON tags.id=post_tag.tag_id 
            WHERE post_id=$id
        ";
        $rows = Db::getInstance()->query($sql);
        $models = [];

        foreach ($rows as $row) {
            $models[] = new Tag($row);
        }
        
        return $models;
        
    }

    static function get ($id) {
        $rows = Db::getInstance()->query("SELECT * FROM posts WHERE id=$id");
        $row = $rows[0];

        return new self($row);
    }

    static function getFiltered($offset, $limit) {
        $rows = Db::getInstance()->query("SELECT * FROM posts LIMIT $offset,$limit");

        foreach ($rows as $row) {
            $models[] = new self($row);
        }
        
        return $models;
    }

    static function getLatest() {
        $rows = Db::getInstance()->query("SELECT * FROM posts ORDER BY id DESC LIMIT 1");
        $row = $rows[0];

        return new self($row);
    }

    static function getCount() {
        $rows = Db::getInstance()->query("SELECT count(id) FROM posts");
        $row = $rows[0][0];

        return $row;
    }
}

?>