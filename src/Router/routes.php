<?php

$this->get('/', 'Action\GetHome');
$this->post('/', 'Action\GetHome');

$this->get('/test', 'Action\GetTest');
