<?php

namespace Controllers;

use Models\User;
use Models\Tag;
use Core\View;
use Core\Auth;
use Core\Url;

class AdminTagDelete {

    function get($request, $params){
        Auth::verifyLogin($request);
        $user = Auth::getLoggedInUser();

        $tagId = $params[0];
        $tag = Tag::get($tagId);
        $tag->delete();

        header('Location: '.'http://'.$request->domain.Url::gen('/admintaglist'));
        die();
    }

}