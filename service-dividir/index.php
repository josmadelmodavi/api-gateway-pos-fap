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

    if (!$valorB == 0) {
        $novaRota = "validar";
        // $url = "http://localhost/api-gateway-pos-fap/service-validar/{$novaRota}";
        $url = "http://localhost:8081/{$novaRota}";

        $config = curl_init($url);
        curl_setopt($config, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($config, CURLOPT_POST, true);
        curl_setopt($config, CURLOPT_POSTFIELDS, array(
            "valorA" => $valorA,
            "valorB" => $valorB
        ));

        $resposta = curl_exec($config);
        curl_close($config);

        $array = json_decode($resposta, true);

        if (empty($array["resultado"])) {
            return $response->withStatus(500)->withJson([
                "erro" => $array["erro"]
            ]);
        }

        $resultado = $valorA / $valorB;

        return $response->withStatus(200)->withJson([
            "resultado da divisão" => "$resultado"
        ]);
    } else {
        return $response->withStatus(500)->withJson([
            "erro" => "Não é possível realizar esta divisão!"
        ]);
    }
});

/* START */
$app->run();
