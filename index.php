<?php 
# TODO: Wrap this in config parameter
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('html_errors', 1);

spl_autoload_register(function ($className) {
    $file = str_replace('\\', DIRECTORY_SEPARATOR, $className) . '.php';
    include __DIR__ . '/' . $file;
});

include 'config.php';

$uri = $_SERVER['REQUEST_URI'];
if (!empty(SUBPATH)) {
    $uri = explode(SUBPATH, $uri);
    $uri = array_filter($uri);
    $uri = current($uri);
}

$uri = trim($uri, '/');
$path = explode("?", $uri);
$path = $path[0];
$path = explode("/", $path);

$urls = [
    ["adminlogin", new Controllers\AdminLogin()],
    ["adminhome", new Controllers\AdminHome()],
    ["adminpostcreate", new Controllers\AdminPostCreate()],
    ["adminpostupdate", new Controllers\AdminPostUpdate()],
    ["adminpostdelete", new Controllers\AdminPostDelete()],
    ["admincategorylist", new Controllers\AdminCategoryList()],
    ["admincategorycreate", new Controllers\AdminCategoryCreate()],
    ["admincategoryupdate", new Controllers\AdminCategoryUpdate()],
    ["admincategorydelete", new Controllers\AdminCategoryDelete()],
    ["admintaglist", new Controllers\AdminTagList()],
    ["admintagcreate", new Controllers\AdminTagCreate()],
    ["admintagupdate", new Controllers\AdminTagUpdate()],
    ["admintagdelete", new Controllers\AdminTagDelete()],
    ["admintags", new Controllers\AdminTags()],
    ["postdetail", new Controllers\PostDetail()],
    ["postlist", new Controllers\PostList()],
    ["tagpostlist", new Controllers\TagPostList()],
    ["categorypostlist", new Controllers\CategoryPostList()],
    ["", new Controllers\Home()],
];

$request = Core\Request::createFromServer();

foreach ($urls as $url){
    if ($url[0] !== $path[0]) {
        continue;
    }

    $params = array_slice($path, 1);

    if($request->method == "POST") {
        return $url[1]->post($request, $params)->render();
    }

    return $url[1]->get($request, $params)->render();
}

?>
