<?php

namespace Controllers; 

use Models\Tag;
use Models\Post;
use \Core\View;


class TagPostList {

    function get($request, $params) {
        $tagId = $params[0];
        $tag = Tag::get($tagId);
        $posts = $tag->getPosts();

        $offset = isset($request->vars['offset']) ? $request->vars['offset'] : 0;
        $totalPosts = Post::getCount();
        $postsPerPage = 3;

        

        // $posts = Post::getFiltered($offset, $postsPerPage);


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