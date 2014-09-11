<?php namespace Router;

use Http\Request;

class Router {

    protected $routes = [];

    /**
     * @var Request
     */
    protected  $request;

    private function __construct(Request $request)
    {
        $this->request = $request;

        require 'routes.php';
    }

    public static function instance()
    {
        static $instance = null;

        if($instance === null)
        {
            $instance = new Router(new Request());
        }

        return $instance;
    }

    public function run()
    {
        if( isset($this->routes[$this->request->method][$this->request->uri]) )
        {
            $actionClass = $this->routes[$this->request->method][$this->request->uri];

            $action = new $actionClass;

            $action->run();
        }
        else
        {
            echo 'not found :(';
        }
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
}