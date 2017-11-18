<?php

namespace Models;
use \Core\Db;

class Category extends Model
{

    static function get ($id) {
        $rows = Db::getInstance()->query("SELECT * FROM categories WHERE id=$id");
        $row = $rows[0];

        return new Category($row);
    }

    static function getBySlug ($slug) {
        $rows = Db::getInstance()->query("SELECT * FROM categories WHERE slug=$slug");
        $row = $rows[0];

        return new Category($row);
    }
}

?>