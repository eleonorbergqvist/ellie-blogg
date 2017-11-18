<?php
namespace Controllers;

use Models\User;
use \Core\View;
use \Core\Auth;

class AdminHome {

    function get($request, $params){
        Auth::verifyLogin($request);
        $user = Auth::getLoggedInUser();
        return new View('adminhome.php', [
            'user' => $user,
        ]);
    }



}