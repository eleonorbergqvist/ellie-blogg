<?php

namespace Controllers; 

use Models\Tag;
use Models\Post;
use Models\Category;
use \Core\View;


class TagPostList {

    function get($request, $params) {
        $tagId = $params[0];
        $tag = Tag::get($tagId);
        $posts = $tag->getPosts();

        return new View('postlist.php', [
            'pageTitle' => 'Tagg: '.$tag->getField('name'),
            'posts' => $posts,
            'categories' => Category::getAll(),
            'tags' => Tag::getAll(),
        ]);
    }
}