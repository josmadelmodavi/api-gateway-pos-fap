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

$app->post("/operacao", function (Request $request, Response $response, $args) {

    $body = $request->getParsedBody();
    $valorA = $body["valorA"] ?? null;
    $valorB = $body["valorB"] ?? null;

    $resultado = $valorA + $valorB;

    return $response->withStatus(200)->withJson([
        "resultado da soma" => "$resultado"
    ]);
});

/* START */
$app->run();
