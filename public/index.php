<?php
require __DIR__ . "/../vendor/autoload.php";
use \Core\Request;
use \Core\Router\Router;
use \Core\Router\Route;
$request = Request::createFromGlobals();
//echo "<pre>";
//var_dump($request);
//echo "</pre>";

try {
    $router = new Router($request);
    $router
        ->addRoute(new Route("testsFoo", "/tests/foo", [], \App\Controller\TestsController::class, "foo"))
        ->addRoute(new Route("testsBar", "/tests/category/:param", ["param" => "[\w]+"], \App\Controller\TestsController::class, "category"))
        ->addRoute(new Route("testsRedirection", "/tests/redirection/:param", ["param" => "[\w]+"], \App\Controller\TestsController::class, "redirection"))
        ->addRoute(new Route("userIndex", "/user", [], \App\Controller\UserController::class, "index"))
        ->addRoute(new Route("userLogin", "/user/login", [], \App\Controller\UserController::class, "login"))
        ->addRoute(new Route("userLogout", "/user/logout", [], \App\Controller\UserController::class, "logout"));

    $route = $router->getRouteByRequest();
    $route->call($request, $router);
} catch (\Exception $e) {
    echo $e->getMessage();
}