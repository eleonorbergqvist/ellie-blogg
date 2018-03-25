<?php

namespace Controllers;

use Models\User;
use Models\Post;
use Models\Tag;
use Models\Category;
use Core\View;
use Core\Auth;
use Core\Url;

class AdminCategoryCreate {
    function get($request, $params){
        Auth::verifyLogin($request);
        $user = Auth::getLoggedInUser();

        return new View('admincategoryedit.php', [
            'pageTitle' => 'Skapa kategori',
            'user' => $user,
        ]);
    }

    function post($request, $params) {
        Auth::verifyLogin($request);
        $user = Auth::getLoggedInUser();

        $vars = $request->vars;
        $valid = strlen($vars['name']);
                
        if (!$valid) {
            return new View('adminedit.php', [
                'pageTitle' => 'Skapa kategori',
                'user' => $user,
                'message' => "Failed to post",
                'name' => $vars['name'],
            ]);
        }

        $category = new Category([
            'name' => $vars['name'],
            'slug' => strtolower($vars['name']),
        ]);

        try {
            $category->save();
            header('Location: '.'http://'.$request->domain.Url::gen('/admincategoryupdate/') . $category->getField('id'));
            die();
        } catch (\Exception $e) {
             return new View('adminedit.php', [
                'pageTitle' => 'Skapa post',
                'user' => $user,
                'message' => "Oh no :sadface:, something when wrong in the db layer",
                'name' => $vars['name'],
            ]);
        }
    }
}

?>
