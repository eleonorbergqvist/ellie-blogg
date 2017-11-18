<?php
//Visar arkiv postlista med antal posts och paginering

namespace Controllers; 

use Models\Post;
use \Core\View;


class PostList {

    function get($request, $params) {

        $offset = isset($request->vars['offset']) ? $request->vars['offset'] : 0;
        $totalPosts = Post::getCount();
        $postsPerPage = 3;

        $posts = Post::getFiltered($offset, $postsPerPage);


        return new View('postlist.php', [
            'posts' => $posts,
            'offset' => $offset,
            'totalPosts' => $totalPosts,
            'postsPerPage' => $postsPerPage
            //key => $value
            //döper till post eftersom nummer inte kan vara variabler och det är dåligt.
        ]);

    }


}


