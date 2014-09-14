<?php

use Core\App;

$router = App::instance()->router;

$router->get('/', 'Action\GetHome');
$router->post('/', 'Action\GetHome');

$router->get('/test', 'Action\GetTest');