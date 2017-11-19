<?php
namespace Core;

use \Core\Url;

class View {
    private $template;
    private $data;

    public function __construct($template, $data) {
        $this->template = $template;
        $this->data = $data;
    }

    public function render() {
        extract($this->data);

        $url = function($path) {
            return Url::gen($path);
        };

        $template = $this->template;

        require('Views/layout.php');
    }

}