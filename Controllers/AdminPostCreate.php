<?php

namespace Controllers;

use Models\User;
use Models\Post;
use Models\Tag;
use Models\Category;
use Core\View;
use Core\Auth;
use Core\Url;

class AdminPostCreate {
    function get($request, $params){
        Auth::verifyLogin($request);
        $user = Auth::getLoggedInUser();

        $tags = Tag::getAll();
        $categories = Category::getAll();
        $selectedTagIds = [];

        return new View('adminedit.php', [
            'pageTitle' => 'Skapa post',
            'user' => $user,
            'categories' => $categories,
            'tags' => $tags,
            'selectedTagIds' => $selectedTagIds,
        ]);
    }

    function post($request, $params) {
        Auth::verifyLogin($request);
        $user = Auth::getLoggedInUser();

        $vars = $request->vars;
        $valid = strlen($vars['title']) && strlen($vars['content']);
        $tagIds = $vars["tag_ids"];

        $categories = Category::getAll();
        
        if (!$valid) {
            return new View('adminedit.php', [
                'pageTitle' => 'Skapa post',
                'user' => $user,
                'message' => "Failed to post",
                'title' => $vars['title'],
                'content' => $vars['content'],
                'categories' => $categories,
            ]);
        }

        $post = new Post([
            'title' => $vars['title'],
            'content' => $vars['content'],
            'user_id' => (int) $user->getField('id'),
            'category_id' => (int) $vars['category_id'],
        ]);

        try {
            $post->save();
            $post->addTags($tagIds);
            header('Location: '.'http://'.$request->domain.Url::gen('/adminpostupdate/') . $post->getField('id'));
            die();
        } catch (\Exception $e) {
             return new View('adminedit.php', [
                'pageTitle' => 'Skapa post',
                'user' => $user,
                'message' => "Oh no :sadface:, something when wrong in the db layer",
                'title' => $vars['title'],
                'content' => $vars['content'],
                'categories' => $categories,
            ]);
        }
    }
}

?>
