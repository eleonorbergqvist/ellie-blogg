<?php
namespace Controllers; 

use Models\Post;
use Models\Category;
use Models\Tag;
use \Views\PostDetail as PostDetailView;
use \Core\View;


class PostDetail {

    function get($request, $params){
        $postId = $params[0];
        $post = Post::get($postId);

        return new View('postdetail.php', [
            'pageTitle' => $post->getField('title'),
            'post' => $post,
            'title' => $post->getField('title'),
            'categories' => Category::getAll(),
            'tags' => Tag::getAll(),
        ]);
    }
}

?>