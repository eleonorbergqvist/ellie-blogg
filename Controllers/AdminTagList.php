<?php

namespace Controllers;

use Models\User;
use Models\Post;
use Models\Tag;
use Core\View;
use Core\Auth;
use Core\Url;

class AdminTagList {
    function get($request, $params){
        Auth::verifyLogin($request);
        $user = Auth::getLoggedInUser();

        $tags = Tag::getAll();

        return new View('admintaglist.php', [
            'pageTitle' => 'Admin Categories',
            'user' => $user,
            'tags' => $tags,
        ]);
    }

    function tag($request, $params) {
        Auth::verifyLogin($request);
        $user = Auth::getLoggedInUser();

        $vars = $request->vars;
        $valid = strlen($vars['title']) && strlen($vars['content']);

        $tags = Tag::getAll();
        
        if (!$valid) {
            return new View('adminedit.php', [
                'pageTitle' => 'Skapa tag',
                'user' => $user,
                'message' => "Failed to tag",
                'title' => $vars['title'],
                'content' => $vars['content'],
                'tags' => $tags,
            ]);
        }

        $tag = new Tag([
            'title' => $vars['title'],
            'content' => $vars['content'],
            'user_id' => (int) $user->getField('id'),
            'tag_id' => (int) $vars['tag_id'],
        ]);

        try {
            $tag->save();
            header('Location: '.'http://'.$request->domain.Url::gen('/admintagupdate/') . $tag->getField('id'));
            die();
        } catch (\Exception $e) {
             return new View('adminedit.php', [
                'pageTitle' => 'Skapa tag',
                'user' => $user,
                'message' => "Oh no :sadface:, something when wrong in the db layer",
                'title' => $vars['title'],
                'content' => $vars['content'],
                'tags' => $tags,
            ]);
        }
    }
}

?>
