<?php

$app = \Core\App::instance();

$router = $app->router;

$router->get('/', 'Action\GetHome');
$router->post('/', 'Action\GetHome');

$router->get('/test', 'Action\GetTest');