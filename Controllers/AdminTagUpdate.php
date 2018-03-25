<?php

namespace Controllers;

use Models\User;
use Models\Post;
use Models\Tag;
use Core\View;
use Core\Auth;
use Core\Url;

class AdminTagUpdate {
    function get($request, $params){
        Auth::verifyLogin($request);
        $user = Auth::getLoggedInUser();
        $tagId = $params[0];
        $tag = Tag::get($tagId);

        return new View('admintagedit.php', [
            'pageTitle' => 'Ändra tagg',
            'user' => $user,
            'name' => $tag->getField('name'),
            'tag' => $tag,
        ]);
    }

    function post($request, $params) {
        Auth::verifyLogin($request);
        $user = Auth::getLoggedInUser();

        $tagId = $params[0];
        $tag = Tag::get($tagId);

        $vars = $request->vars;
        $valid = (bool) strlen($vars['name']);
        
        if (!$valid) {
            return new View('admintagedit.php', [
                'pageTitle' => 'Ändra tagg',
                'user' => $user,
                'message' => "Failed to post",
                'name' => $vars['name'],
            ]);
        }

        $tag->setFields([
            'name' => $vars['name'],
            'slug' => strtolower($vars['name']),
        ]);

        try {
            $tag->update();
            header('Location: '.'http://'.$request->domain.Url::gen('/admintagupdate/').$tag->getField('id'));
            die();
        } catch (\Exception $e) {
             return new View('admintagedit.php', [
                // 'message' => "Oh no :sadface:, something when wrong in the db layer",
                'message' => $e,
                'pageTitle' => 'Ändra tagg',
                'user' => $user,
                'name' => $vars['name'],
            ]);
        }
    }
}

?>