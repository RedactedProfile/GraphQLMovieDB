<?php

require_once 'vendor/autoload.php';
require_once 'bootstrap.php';

use MovieDB\Entity\Movie;
use MovieDB\Entity\Person;
use Youshido\GraphQL\Execution\Processor;
use MovieDB\Schema\MovieDBSchema;

header('Access-Control-Allow-Headers: Content-Type');
header('Access-Control-Allow-Credentials: true', true);
header('Access-Control-Allow-Origin: http://127.0.0.1:8000');
if ($_SERVER['REQUEST_METHOD'] == "OPTIONS") {
    return;
}
if ($_SERVER['REQUEST_URI'] == '/graphiql.css') {
    header('Content-Type: text/css');
    readfile(__DIR__ . '/../GraphiQL/graphiql.css');
    die();
}

if ((isset($_SERVER['CONTENT_TYPE']) && $_SERVER['CONTENT_TYPE'] === 'application/json')
    || isset($_SERVER['HTTP_CONTENT_TYPE']) && $_SERVER['HTTP_CONTENT_TYPE'] === 'application/json'
) {
    $rawBody     = file_get_contents('php://input');
    $requestData = json_decode($rawBody ?: '', true);
} else {
    $requestData = $_POST;
}
$payload   = isset($requestData['query']) ? $requestData['query'] : null;
$variables = isset($requestData['variables']) ? $requestData['variables'] : null;
if (empty($payload)) {
    $GraphiQLData = file_get_contents(__DIR__ . '/../GraphiQL/index.html');
    echo $GraphiQLData;
    die();
}
$processor = new Processor(new MovieDBSchema());
$response = $processor->processPayload($payload, $variables)->getResponseData();
header('Content-Type: application/json');
echo json_encode($response);