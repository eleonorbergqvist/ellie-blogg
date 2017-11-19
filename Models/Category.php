<?php

namespace Models;
use \Core\Db;
use \Core\Url;

class Category extends Model
{
    function getUrl() {
        return Url::gen('/categorypostlist/'.$this->getField('id'));
    }

    function getPosts() {
        $categoryId = $this->getField('id');
        $rows = Db::getInstance()->query("SELECT * FROM posts WHERE category_id=$categoryId");

        $models = [];
        foreach ($rows as $row) {
            $models[] = new Post($row);
        }
        
        return $models;
    }

    static function get ($id) {
        $rows = Db::getInstance()->query("SELECT * FROM categories WHERE id=$id");
        $row = $rows[0];

        return new self($row);
    }

    static function getBySlug ($slug) {
        $rows = Db::getInstance()->query("SELECT * FROM categories WHERE slug=$slug");
        $row = $rows[0];

        return new self($row);
    }

    static function getAll() {
        $rows = Db::getInstance()->query("SELECT * FROM categories");
        $row = $rows[0];

        $models = [];
        foreach ($rows as $row) {
            $models[] = new self($row);
        }
        
        return $models;
    }
}

?>