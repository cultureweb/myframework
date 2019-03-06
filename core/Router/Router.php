<?php
namespace Core\Router;
use Core\Request;
class Router
{
    /**
     * @var array
     */
    private $routes;
    /**
     * @var Request
     */
    private $request;
    /**
     * RouterInterface constructor.
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    /**
     * @param Route $route
     *
     * @return Router
     * @throws \Exception
     */
    public function addRoute(Route $route)
    {
        // TODO: Implement addRoute(Route $route) method.

        // Si la route existe déjà (teste sur le nom) alors on soulève une erreur
        if(isset($this->routes[$route->getName()])) {
            throw new \Exception("Cette route ");
        }

       $this->routes[$route->getname()] =$route;//ceci appelle l'attribut
        // Sinon on l'ajoute a la liste de nos routes !
        return $this;
    }
    /**
     * @return mixed
     * @throws \Exception
     */
    public function getRouteByRequest()
    {
        /// Pour chaque route, on teste si elle correspond à la requête, si oui alors on renvoie cette route
        foreach($this->routes as $route) {
            if($route->match($this->request->getServer()['REQUEST_URI'])) {
                return $route;
            }
        }
        // Sinon on soulève une erreur
        throw new \Exception("Cette route n'existe pas !");
    }
}