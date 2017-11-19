<?php
//visar loginruta
namespace Controllers;

use Models\User;
use \Core\View;
use \Core\Url;

class AdminLogin {

    function get($request, $params){
        //$post = 

        //kolla så att inte skickas känslig info med en get
        //if (!$this->request->isPost()) {
            //return new View('login.php', [])
       // }


        return new View('login.php', [
            'pageTitle' => 'Logga in',
        ]);
    }

    function post($request, $params){

        try {
            $user = User::get($request->vars['email']);

            $userId = $user->getField('id');

            setcookie("TestCookie", $userId, time()+3600);

            //setcookie("TestCookie", $value, time()+3600);  /* expire in 1 hour */
            //setcookie("TestCookie", $value, time()+3600, "/~rasmus/", "example.com", 1);
            
            header('Location: '.'http://'.$request->domain.Url::gen('/adminhome'));
            die();

        } catch (\Exception $e){
            return new View('login.php', [
                'message' => "Failed to log in",
            ]);
        }

        
    }


}

?>