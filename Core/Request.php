<?php
namespace Core;

class Request {

    const GET = 'GET';
    const POST = 'POST';
    private $domain;
    private $path;
    private $method;

    public function __construct($domain, $path, $method) {
        $this->domain = $domain;
        $this->path = $path;
        $this->method = $method;
    }

    //factory funktion som skapar instans
    public static function createFromServer () {
        $domain = $_SERVER['HTTP_HOST'];
        $path = $_SERVER['REQUEST_URI'];
        $method = $_SERVER['REQUEST_METHOD'];

        return new self($domain, $path, $method);
    }

}