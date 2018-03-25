<?php

namespace Controllers;

use Models\User;
use Models\Post;
use Models\Tag;
use Models\Category;
use Core\View;
use Core\Auth;
use Core\Url;

class AdminCategoryUpdate {
    function get($request, $params){
        Auth::verifyLogin($request);
        $user = Auth::getLoggedInUser();
        $categoryId = $params[0];
        $category = Category::get($categoryId);

        $categories = Category::getAll();

        return new View('admincategoryedit.php', [
            'pageTitle' => 'Ändra kategori',
            'user' => $user,
            'name' => $category->getField('name'),
            'category' => $category,
        ]);
    }

    function post($request, $params) {
        Auth::verifyLogin($request);
        $user = Auth::getLoggedInUser();

        $categoryId = $params[0];
        $category = Category::get($categoryId);

        $vars = $request->vars;
        $valid = (bool) strlen($vars['name']);
        
        if (!$valid) {
            return new View('admincategoryedit.php', [
                'pageTitle' => 'Ändra post',
                'user' => $user,
                'message' => "Failed to post",
                'name' => $vars['name'],
            ]);
        }

        $category->setFields([
            'name' => $vars['name'],
            'slug' => strtolower($vars['name']),
        ]);

        try {
            $category->update();
            header('Location: '.'http://'.$request->domain.Url::gen('/admincategoryupdate/').$category->getField('id'));
            die();
        } catch (\Exception $e) {
             return new View('admincategoryedit.php', [
                // 'message' => "Oh no :sadface:, something when wrong in the db layer",
                'message' => $e,
                'pageTitle' => 'Ändra post',
                'user' => $user,
                'name' => $vars['name'],
            ]);
        }
    }
}

?>