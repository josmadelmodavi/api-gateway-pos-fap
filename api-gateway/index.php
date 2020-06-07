<?php

require "vendor/autoload.php";

use Slim\App;
use Slim\Container;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

/* INIT */

$config = new Container([
    'settings' => [
        'displayErrorDetails' => true
    ]
]);

$app = new App($config);

/* START */
$app->run();
