<?php

namespace Models;
use \Core\Db;

class Model 
{
    protected $fields;

    function __construct($fields) {
        $this->fields = $fields;
    }

    function getField($name) {
        return $this->fields[$name];
    }

}

?>