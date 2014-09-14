<?php namespace Router;

class Router {

    public $routes = [];

    public function __construct()
    {
        //require 'routes.php';
    }

    public function get($uri, $action)
    {
        $this->addRoute('GET', $uri, $action);
    }

    public function post($uri, $action)
    {
        $this->addRoute('POST', $uri, $action);
    }

    public function addRoute($method, $uri, $action)
    {
        $uri = $this->formatUri($uri);

        if( ! class_exists($action) )
        {
            throw new \Exception('Action class not found');
        }

        $this->routes[$method][$uri] = $action;
    }

    /**
     * @param $uri
     * @return string
     */
    public function formatUri($uri)
    {
        if (substr($uri, 0, 1) <> '/')
        {
            $uri = '/' . $uri;

            return $uri;
        }

        return $uri;
    }

    public function routeExists($method, $uri)
    {
        return isset($this->routes[$method][$uri]);
    }

    public function getClass($method, $uri)
    {
        return $this->routes[$method][$uri];
    }
}