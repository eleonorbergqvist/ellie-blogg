<?php
//visar startvy

namespace Controllers; 

use Models\Post;
use \Core\View;
// use \Views\

class Home {

    function get($request, $params){
        echo "Home";
        $post = Post::getLatest();

        return new View('home.php', [
            'post' => $post,
            //key => $value
            //Arrays and objects can not be used as keys. Doing so will result in a warning: Illegal offset type.
        ]);
    }
}