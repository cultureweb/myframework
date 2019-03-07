<?php
/**
 * Created by PhpStorm.
 * User: Utilisateur
 * Date: 06/03/2019
 * Time: 14:25
 */

namespace Core;


use Core\Router\Router;
use duncan3dc\Laravel\BladeInstance;

/**
 * @property  router
 */
abstract class Controller
{

    /**
     * @var Request
     */
    private $request;
    /**
     * @var Router
     */
    private $router;
    /**
     * @var BladeInstance
     */
    private $blade;
    /**

    /**
     * Controller constructor.
     *
     * @param Request $request
     * @param Router $router
     */
    public function __construct(Request $request, Router $router)
    {
        $this->request = $request;
        $this->router = $router;
        $server = $request->getServer();
        $this->blade = new BladeInstance($server['DOCUMENT_ROOT'] . '/../src/View/', $server['DOCUMENT_ROOT'] . '/../tmp/cache/views/');
    }

    /**
     * @param       $routeName
     * @param array $args
     *
     * @throws \Exception
     */
    protected final function redirect($routeName, $args = [])
    {
        $route = $this->router->getRoute($routeName);
        header(sprintf("Location: %s", $route->generateUrl($args)));
    }

    /**
     * @param string $filename
     * @param array $data
     */
    protected function render($filename, $data = [])
    {
        echo $this->blade->render($filename, $data);
    }

}