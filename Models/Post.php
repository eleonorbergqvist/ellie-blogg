<?php

namespace Models;
use \Core\Db;
use \Core\Url;

class Post extends Model
{
    function getUrl() {
        return Url::gen('/postdetail/'.$this->getField('id'));
    }

    function getCategory() {
        return Category::get($this->getField('category_id'));
    }

    function delete() {
        $id = $this->getField('id');

        $sql = "DELETE FROM posts WHERE id = $id";
        $statement = Db::getInstance()->execute($sql);
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

    function save() {
        $keys = array_keys($this->fields);
        $values = array_values($this->fields);

        foreach($values as $key => $value) {
            $value = is_string($value) ? '"'.$value.'"' : $value;
            $values[$key] = $value;
        }

        $sql = "INSERT INTO posts 
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

        $sql = "UPDATE posts 
            SET ".implode(', ', $updateFields)."
            WHERE id=$id";

        $statement = Db::getInstance()->execute($sql);
        $insertedId = Db::getInstance()->lastInsertId();

        $this->clearChangedFields();
    }

    static function get ($id) {
        $rows = Db::getInstance()->query("SELECT * FROM posts WHERE id=$id");
        $row = $rows[0];

        return new self($row);
    }

    static function getAll() {
        $rows = Db::getInstance()->query("SELECT * FROM posts");
        $models = [];

        foreach ($rows as $row) {
            $models[] = new self($row);
        }
        
        return $models;
    }

    static function getFiltered($offset, $limit) {
        $rows = Db::getInstance()->query("SELECT * FROM posts LIMIT $offset,$limit");
        $models = [];

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
        $rows = Db::getInstance()->query("SELECT count(id) as num_rows FROM posts");
        $row = $rows[0]['num_rows'];

        return $row;
    }
}

?>