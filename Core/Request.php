<?php
namespace Core;

class Request {
    public $domain;
    public $path;
    public $method;
    public $vars;

    public function __construct($domain, $path, $method, $vars) {
        $this->domain = $domain;
        $this->path = $path;
        $this->method = $method;
        $this->vars = $vars;
    }

    //factory funktion som skapar instans
    public static function createFromServer () {
        $domain = $_SERVER['HTTP_HOST'];
        $path = $_SERVER['REQUEST_URI'];
        $method = $_SERVER['REQUEST_METHOD'];
        $vars = array_merge($_GET, $_POST);

        return new self($domain, $path, $method, $vars);
    }

}
