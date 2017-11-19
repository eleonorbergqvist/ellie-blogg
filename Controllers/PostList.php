<?php
//Visar arkiv postlista med antal posts och paginering

namespace Controllers; 

use Models\Post;
use Models\Category;
use Models\Tag;
use \Core\View;


class PostList {

    function get($request, $params) {

        /*
        $offset = isset($request->vars['offset']) ? $request->vars['offset'] : 0;
        $totalPosts = Post::getCount();
        $postsPerPage = 3;
        */

        $posts = Post::getAll();

        return new View('postlist.php', [
            'pageTitle' => 'Archive',
            'posts' => $posts,
            'categories' => Category::getAll(),
            'tags' => Tag::getAll(),
            //key => $value
            //döper till post eftersom nummer inte kan vara variabler och det är dåligt.
        ]);

    }


}


