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

/* SOMAR */
$app->group("/somar", function () use ($app) {

    $app->post("[/{params:.*}]", function (Request $request, Response $response, $args) {

        if (!empty($args["params"]) && $args["params"] == "resultado") {
            $novaRota = "operacao";
            // $url = "http://localhost/api-gateway-pos-fap/service-somar/{$novaRota}";
            $url = "http://localhost:8082/{$novaRota}";

            $valorA = $request->getParsedBody()["valorA"];
            $valorB = $request->getParsedBody()["valorB"];

            $config = curl_init($url);
            curl_setopt($config, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($config, CURLOPT_POST, true);
            curl_setopt($config, CURLOPT_POSTFIELDS, array(
                "valorA" => $valorA,
                "valorB" => $valorB
            ));

            $resposta = curl_exec($config);
            curl_close($config);

            return $response->withJson(
                json_decode($resposta, true)
            );
        }
    });
});

/* SUBTRAIR */
$app->group("/subtrair", function () use ($app) {

    $app->post("[/{params:.*}]", function (Request $request, Response $response, $args) {

        if (!empty($args["params"]) && $args["params"] == "resultado") {
            $novaRota = "operacao";
            // $url = "http://localhost/api-gateway-pos-fap/service-subtrair/{$novaRota}";
            $url = "http://localhost:8083/{$novaRota}";

            $valorA = $request->getParsedBody()["valorA"];
            $valorB = $request->getParsedBody()["valorB"];

            $config = curl_init($url);
            curl_setopt($config, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($config, CURLOPT_POST, true);
            curl_setopt($config, CURLOPT_POSTFIELDS, array(
                "valorA" => $valorA,
                "valorB" => $valorB
            ));

            $resposta = curl_exec($config);
            curl_close($config);

            return $response->withJson(
                json_decode($resposta, true)
            );
        }
    });
});

/* MULTIPLICAR */
$app->group("/multiplicar", function () use ($app) {

    $app->post("[/{params:.*}]", function (Request $request, Response $response, $args) {

        if (!empty($args["params"]) && $args["params"] == "resultado") {
            $novaRota = "operacao";
            // $url = "http://localhost/api-gateway-pos-fap/service-multiplicar/{$novaRota}";
            $url = "http://localhost:8084/{$novaRota}";

            $valorA = $request->getParsedBody()["valorA"];
            $valorB = $request->getParsedBody()["valorB"];

            $config = curl_init($url);
            curl_setopt($config, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($config, CURLOPT_POST, true);
            curl_setopt($config, CURLOPT_POSTFIELDS, array(
                "valorA" => $valorA,
                "valorB" => $valorB
            ));

            $resposta = curl_exec($config);
            curl_close($config);

            return $response->withJson(
                json_decode($resposta, true)
            );
        }
    });
});

/* DIVIDIR */
$app->group("/dividir", function () use ($app) {

    $app->post("[/{params:.*}]", function (Request $request, Response $response, $args) {

        if (!empty($args["params"]) && $args["params"] == "resultado") {
            $novaRota = "operacao";
            // $url = "http://localhost/api-gateway-pos-fap/service-dividir/{$novaRota}";
            $url = "http://localhost:8085/{$novaRota}";

            $valorA = $request->getParsedBody()["valorA"];
            $valorB = $request->getParsedBody()["valorB"];

            $config = curl_init($url);
            curl_setopt($config, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($config, CURLOPT_POST, true);
            curl_setopt($config, CURLOPT_POSTFIELDS, array(
                "valorA" => $valorA,
                "valorB" => $valorB
            ));

            $resposta = curl_exec($config);
            curl_close($config);

            return $response->withJson(
                json_decode($resposta, true)
            );
        }
    });
});

/* START */
$app->run();
