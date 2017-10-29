<?php
namespace Views;

class PostDetail {
    
    private $data;
    function __construct($data) {
        $this->data = $data;
    }

    function render() {
        ?>
        <html>
            <head>
            </head>
            <body>
                <h1><?= $this->data['post']->getField('title'); ?></h1>
            </body>
        </html>
        <?php
    }

}