<?php

namespace Models;
use \Core\Db;

class Model 
{
    protected $fields;
    protected $changedFields;

    function __construct($fields) {
        $this->fields = (array) $fields;
        $this->changedFields = [];
    }

    public function getField($name) {
        return $this->fields[$name];
    }

    public function setFields($fields) {
        $this->fields = array_merge($this->fields, $fields);
        $keys = array_keys($fields);

        $changedFields = array_merge(
            $this->changedFields, 
            $keys
        );

        $this->changedFields = array_unique($changedFields);
    }

    protected function clearChangedFields() {
        $this->changedFields = [];
    }
}

?>