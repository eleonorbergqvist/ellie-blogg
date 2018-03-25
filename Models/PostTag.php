<?php

namespace Models;
use \Core\Db;
use \Core\Url;

class PostTag extends Model
{
    function save() {
        $keys = array_keys($this->fields);
        $values = array_values($this->fields);

        foreach($values as $key => $value) {
            $value = is_string($value) ? '"'.$value.'"' : $value;
            $values[$key] = $value;
        }

        $sql = "INSERT INTO post_tag 
            (".implode(',', $keys).")
            VALUES 
            (".implode(',', $values).");";

        $statement = Db::getInstance()->execute($sql);
        $insertedId = Db::getInstance()->lastInsertId();

        $this->fields['id'] = $insertedId;

        $this->clearChangedFields();
    }
}