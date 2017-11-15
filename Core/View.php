<?php
namespace Core;

class View {
    private $template;
    private $data;

    public function __construct($template, $data) {
        $this->template = $template;
        $this->data = $data;
    }

    public function render() {
        extract($this->data);

        $template = $this->template;

        require('Views/layout.php');
    }

}