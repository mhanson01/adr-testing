<?php

use Core\App;

require '../vendor/autoload.php';

require '../src/Router/routes.php';

$app = App::instance();

$app->run();
