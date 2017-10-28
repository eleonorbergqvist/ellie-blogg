<?php 
error_reporting(-1);
ini_set('display_errors', 'On');

spl_autoload_register(function ($className) {
    $file = str_replace('\\', DIRECTORY_SEPARATOR, $className) . '.php';
    include __DIR__ . '/' . $file;
});

new Models\Post();


echo "My first php server ellie pellie"; 

var_dump($_POST);






?>