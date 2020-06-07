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

$app->post("/validar", function (Request $request, Response $response, $args) {

    $body = $request->getParsedBody();
    $valorA = $body["valorA"] ?? null;
    $valorB = $body["valorB"] ?? null;

    if (!isset($valorA) || !is_numeric($valorA) || !isset($valorB) || !is_numeric($valorB)) {
        return $response->withStatus(500)->withJson([
            "erro" => "Um ou mais valores estão vazios ou não são numéricos!"
        ]);
    } else {
        return $response->withStatus(200)->withJson([
            "resultado" => true
        ]);
    }
});

/* START */
$app->run();
