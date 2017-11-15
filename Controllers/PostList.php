<?php
//Visar arkiv postlista med antal posts och paginering

namespace Controllers; 

class PostList {

    function get($request, $params) {
        $offset = count($params) > 0 ? $params[0] : 0;

        //var_dump($params);
        $posts = Post::getFiltered($offset, 3);

        return new View('postlist.php', [
            'posts' => $posts,
            //key => $value
            //döper till post eftersom nummer inte kan vara variabler och det är dåligt.
        ]);
    }

}