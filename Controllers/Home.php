<?php
//visar startvy

namespace Controllers; 

use Models\Post;
use Models\Category;
use Models\Tag;
use \Core\View;
// use \Core\Url;

class Home {

    function get($request, $params){
        $post = Post::getLatest();

        return new View('home.php', [
            'pageTitle' => 'Hej',
            'post' => $post,
            'categories' => Category::getAll(),
            'tags' => Tag::getAll(),
        ]);
    }
}




