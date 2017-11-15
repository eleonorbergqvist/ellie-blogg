<?php
namespace Controllers; 

use Models\Post;
use \Views\PostDetail as PostDetailView;
use \Core\View;


class PostDetail {

    function get($request, $params){
        $postId = $params[0];
        $post = Post::get($postId);

        //get select blablab mysql
        // var_dump(Db::getInstance());
        /*

        */

        return new View('postdetail.php', [
            'post' => $post,
            'title' => $post->getField('title'),
        ]);
    }
}

?>