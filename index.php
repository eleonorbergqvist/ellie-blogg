<?php 
error_reporting(-1);
ini_set('display_errors', 'On');

spl_autoload_register(function ($className) {
    $file = str_replace('\\', DIRECTORY_SEPARATOR, $className) . '.php';
    include __DIR__ . '/' . $file;
});

$uri = $_SERVER['REQUEST_URI'];
$trimuri = trim($uri, '/');
$path = explode("/", $trimuri);

$urls = [
    ["adminlogin", new Controllers\AdminLogin()],
    ["adminhome", new Controllers\AdminHome()],
    ["adminpostcreate", new Controllers\AdminPostCreate()],
    ["adminpostupdate", new Controllers\AdminLogin()],
    ["adminpostdelete", new Controllers\AdminPostDelete()],
    ["postdetail", new Controllers\PostDetail()],
    ["postlist", new Controllers\PostList()],
    ["", new Controllers\Home()],
];

foreach ($urls as $url){
    if ($url[0] !== $path[0]) {
        continue;
    }

    $params = array_slice($path, 1);
    return $url[1]->get($params)->render();
}

?>