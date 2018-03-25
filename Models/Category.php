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


    function save() {
        $keys = array_keys($this->fields);
        $values = array_values($this->fields);

        foreach($values as $key => $value) {
            $value = is_string($value) ? '"'.$value.'"' : $value;
            $values[$key] = $value;
        }

        $sql = "INSERT INTO categories 
            (".implode(',', $keys).")
            VALUES 
            (".implode(',', $values).");";

        $statement = Db::getInstance()->execute($sql);
        $insertedId = Db::getInstance()->lastInsertId();

        $this->fields['id'] = $insertedId;

        $this->clearChangedFields();
    }

    function update() {
        $updateFields = [];

        foreach ($this->fields as $key => $value) {
            if (is_int($key)) {
                continue;
            }

            if (!in_array($key, $this->changedFields)) {
                continue;
            }

            $value = is_string($value) ? '"'.$value.'"' : $value;
            $updateFields[] = $key.'='.$value;
        }

        $id = $this->getField('id');

        $sql = "UPDATE categories 
            SET ".implode(', ', $updateFields)."
            WHERE id=$id";

        $statement = Db::getInstance()->execute($sql);
        $insertedId = Db::getInstance()->lastInsertId();

        $this->clearChangedFields();
    }

    function delete() {
        $id = $this->getField('id');

        $sql = "DELETE FROM categories WHERE id = $id";
        $statement = Db::getInstance()->execute($sql);
    }
}

?>