<?php

namespace Controllers;

use Models\User;
use Models\Post;
use Models\Tag;
use Models\Category;
use Core\View;
use Core\Auth;
use Core\Url;

class AdminPostUpdate {
    function get($request, $params){
        Auth::verifyLogin($request);
        $user = Auth::getLoggedInUser();
        $postId = $params[0];
        $post = Post::get($postId);

        $categories = Category::getAll();

        return new View('adminedit.php', [
            'pageTitle' => 'Ändra post',
            'user' => $user,
            'post' => $post,
            'title' => $post->getField('title'),
            'content' => $post->getField('content'),
            'category_id' => $post->getField('category_id'),
            'categories' => $categories,
        ]);
    }

    function post($request, $params) {
        Auth::verifyLogin($request);
        $user = Auth::getLoggedInUser();

        $postId = $params[0];
        $post = Post::get($postId);

        $vars = $request->vars;
        $valid = strlen($vars['title']) && strlen($vars['content']);
        
        if (!$valid) {
            return new View('adminedit.php', [
                'pageTitle' => 'Ändra post',
                'user' => $user,
                'message' => "Failed to post",
                'title' => $vars['title'],
                'content' => $vars['content'],
                'category_id' => (int) $vars['category_id'],
            ]);
        }

        $post->setFields([
            'title' => $vars['title'],
            'content' => $vars['content'],
            'category_id' => (int) $vars['category_id'],
        ]);

        try {
            $post->update();
            header('Location: '.'http://'.$request->domain.Url::gen('/adminpostupdate/').$post->getField('id'));
            die();
        } catch (\Exception $e) {

             return new View('adminedit.php', [
                // 'message' => "Oh no :sadface:, something when wrong in the db layer",
                'message' => $e,
                'pageTitle' => 'Ändra post',
                'user' => $user,
                'title' => $vars['title'],
                'content' => $vars['content'],
                'category_id' => (int) $vars['category_id'],
            ]);
        }
    }
}

?>