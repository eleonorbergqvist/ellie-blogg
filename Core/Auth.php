<?php
namespace Core;

use \Models\User;

class Auth {

    public static function verifyLogin($request) {
        if (!isset($_COOKIE["TestCookie"])) {
            
            header('Location: '.'http://'.$request->domain.'/adminlogin');
            die();
        }
    }

    public static function getLoggedInUser() {
        $userId = $_COOKIE["TestCookie"];
        $user = User::getById($userId);
        return $user;
    }
}