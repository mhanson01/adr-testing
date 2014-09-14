<?php namespace Core;

use Http\Request;
use Http\Response;
use Router\Router;

class App {

    /**
     * @var Router
     */
    public $router;
    /**
     * @var Request
     */
    public $request;
    /**
     * @var Response
     */
    public $response;


    function __construct(Router $router, Request $request, Response $response)
    {
        $this->router = $router;
        $this->request = $request;
        $this->response = $response;
    }

    public static function instance()
    {
        static $instance = null;

        if($instance === null)
        {
            $instance = new App(new Router, new Request, new Response);
        }

        return $instance;
    }

    public function run()
    {
        if($this->router->routeExists($this->request->method, $this->request->uri))
        {
            $actionClass = $this->router->getClass($this->request->method, $this->request->uri);

            $action = new $actionClass($this->request);

            $action->run();
        }
        else
        {
            echo 'not found :(';
        }
    }
}