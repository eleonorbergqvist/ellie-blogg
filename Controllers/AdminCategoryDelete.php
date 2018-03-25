<?php

namespace Controllers;

use Models\User;
use Models\Category;
use Core\View;
use Core\Auth;
use Core\Url;

class AdminCategoryDelete {

    function get($request, $params){
        Auth::verifyLogin($request);
        $user = Auth::getLoggedInUser();

        $categoryId = $params[0];
        $category = Category::get($categoryId);
        $category->delete();

        header('Location: '.'http://'.$request->domain.Url::gen('/admincategorylist'));
        die();
    }

}