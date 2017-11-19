<?php
namespace Core;

class Url {
    public static function gen($path) {
        return SUBPATH.$path;
    }
}

?>