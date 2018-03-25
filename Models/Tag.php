<?php 
namespace Models;
use \Core\Db;
use \Core\Url;

class Tag extends Model
{
    function getUrl() {
        return Url::gen('/tagpostlist/'.$this->getField('id'));
    }

    public function getPosts() {
        $id = $this->getField('id');
        $sql = "
            SELECT posts.* 
            FROM post_tag 
            LEFT JOIN posts 
                ON posts.id=post_tag.post_id 
            WHERE tag_id=$id
        ";
        $rows = Db::getInstance()->query($sql);
        $models = [];

        foreach ($rows as $row) {
            $models[] = new Post($row);
        }
        
        return $models;
    }

    static function get ($id) {
        $rows = Db::getInstance()->query("SELECT * FROM tags WHERE id=$id");
        $row = $rows[0];

        return new self($row);
    }

    static function getAll() {
        $rows = Db::getInstance()->query("SELECT * FROM tags");
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

        $sql = "INSERT INTO tags 
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

        $sql = "UPDATE tags 
            SET ".implode(', ', $updateFields)."
            WHERE id=$id";

        $statement = Db::getInstance()->execute($sql);
        $insertedId = Db::getInstance()->lastInsertId();

        $this->clearChangedFields();
    }

    function delete() {
        $id = $this->getField('id');

        $sql = "DELETE FROM tags WHERE id = $id";
        $statement = Db::getInstance()->execute($sql);
    }
}

?>