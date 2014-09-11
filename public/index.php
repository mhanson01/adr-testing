<?php

use Router\Router;

require '../vendor/autoload.php';

$router = Router::instance();

$router->run();

var_dump($router);