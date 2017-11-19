<?php

namespace Controllers; 

use Models\Tag;
use Models\Category;
use Models\Post;
use \Core\View;


class CategoryPostList {

    function get($request, $params) {
        $categoryId = $params[0];

        $category = Category::get($categoryId);
        $posts = $category->getPosts();

        return new View('postlist.php', [
            'pageTitle' => 'Kategori: '.$category->getField('name'),
            'posts' => $posts,
            'categories' => Category::getAll(),
            'tags' => Tag::getAll(),
        ]);

    }
}