<?php

spl_autoload_register(function (string $className) {
    $className = str_replace("\\", "/", $className);
    if (file_exists("./../$className.php")) {
        require_once "./../$className.php";
        return true;
    }
    return false;
});

$uri = $_SERVER['REQUEST_URI'];

$routes = require_once './../Config/routes.php';

if(isset($routes[$uri])) {
    $handler = $routes[$uri];

    $class = $handler['class'];
    $method = $handler['method'];

    $obj = new $class();
    $obj->$method();
} else {
    require_once './Views/404.html';
}


//spl_autoload_register(function (string $className){
//    require_once "./../Controllers/$className.php";
//});
//
//$uri =$_SERVER['REQUEST_URI'];
//
//if($uri === '/registration') {
//    require_once './../Controllers/UserController.php';
//
//    $controller = new UserController();
//    $controller->registration();
//} elseif ($uri === '/login') {
//    require_once './../Controllers/UserController.php';
//
//    $controller = new UserController();
//    $controller->login();
//} elseif ($uri === '/main') {
//    require_once './../Controllers/MainController.php';
//
//    $controller = new MainController();
//    $controller->main();
//} elseif ($uri === '/response') {
//    require_once './../Controllers/ResponseController.php';
//
//    $controller = new ResponseController();
//    $controller->getResponse();
//} elseif ($uri === '/logout') {
//    require_once './../Controllers/UserController.php';
//
//    $controller = new UserController();
//    $controller->logout();
//}



?>

