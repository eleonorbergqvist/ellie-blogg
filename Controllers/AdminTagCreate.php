<?php

namespace Controllers;

use Models\User;
use Models\Tag;
use Core\View;
use Core\Auth;
use Core\Url;

class AdminTagCreate {
    function get($request, $params){
        Auth::verifyLogin($request);
        $user = Auth::getLoggedInUser();

        return new View('admintagedit.php', [
            'pageTitle' => 'Skapa tagg',
            'user' => $user,
        ]);
    }

    function post($request, $params) {
        Auth::verifyLogin($request);
        $user = Auth::getLoggedInUser();

        $vars = $request->vars;
        $valid = strlen($vars['name']);
                
        if (!$valid) {
            return new View('admintagedit.php', [
                'pageTitle' => 'Skapa tagg',
                'user' => $user,
                'message' => "Failed to post",
                'name' => $vars['name'],
            ]);
        }

        $tag = new Tag([
            'name' => $vars['name'],
            'slug' => strtolower($vars['name']),
        ]);

        try {
            $tag->save();
            header('Location: '.'http://'.$request->domain.Url::gen('/admintagupdate/') . $tag->getField('id'));
            die();
        } catch (\Exception $e) {
             return new View('admintagedit.php', [
                'pageTitle' => 'Skapa tagg',
                'user' => $user,
                'message' => "Oh no :sadface:, something when wrong in the db layer",
                'name' => $vars['name'],
            ]);
        }
    }
}

?>
