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
        ->addRoute(new Route("testsBar", "/tests/bar/:param", ["param" => "[\w]+"], \App\Controller\TestsController::class, "bar"))
        ->addRoute(new Route("testsRedirection", "/tests/redirection/:param", ["param" => "[\w]+"], \App\Controller\TestsController::class, "redirection"));

    $route = $router->getRouteByRequest();
    $route->call($request, $router);
} catch (\Exception $e) {
    echo $e->getMessage();
}