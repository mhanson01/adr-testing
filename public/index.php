<?php

use Router\Router;

require '../vendor/autoload.php';

$router = Router::instance();

$router->get('/', 'Action\GetHome');

$router->run();

var_dump($router);