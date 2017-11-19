<?php

namespace Controllers;

use Models\User;
use Models\Post;
use Models\Tag;
use Core\View;
use Core\Auth;
use Core\Url;

class AdminPostDelete {

    function get($request, $params){
        Auth::verifyLogin($request);
        $user = Auth::getLoggedInUser();

        $postId = $params[0];
        $post = Post::get($postId);
        $post->delete();

        header('Location: '.'http://'.$request->domain.Url::gen('/adminhome'));
        die();
    }

}