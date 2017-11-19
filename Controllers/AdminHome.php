<?php
namespace Controllers;

use Models\User;
use Models\Post;
use Core\View;
use Core\Auth;

class AdminHome {

    function get($request, $params){
        Auth::verifyLogin($request);
        $user = Auth::getLoggedInUser();

        $posts = Post::getAll();

        return new View('adminhome.php', [
            'pageTitle' => 'Inloggad',
            'user' => $user,
            'posts' => $posts,
        ]);
    }



}
