<?php
namespace Controllers; 

use Models\Post;
use \Views\PostDetail as PostDetailView;


class PostDetail {

    function get($params){
        $postId = $params[0];
        $post = Post::get($postId);

        //get select blablab mysql
        // var_dump(Db::getInstance());
        /*
        return new Response('Views/postdetail.php', [
            'post' => $post,
        ]);
        */

        return new PostDetailView([
            'post' => $post,
        ]);
    }
}

?>