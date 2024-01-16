<?php

include_once('request.php');


$routes = [
    '/'     => [
        'GET'  => 'getHome',
        'POST' => 'postHome'
    ],
    '/ping' => [
        'GET' => 'getPing'
    ],
];

$request = getCurrentRequest();

if (!array_key_exists($request['path'], $routes)) {
    http_response_code(404);
    echo 'Not Found';
    die();
}

$routePath = $routes[$request['path']];

if (!array_key_exists($request['method'], $routePath)) {
    http_response_code(405);
    die();
} else {
    call_user_func($routePath[$request['method']], $request);
}



function getHome(array $request)
{
    echo 'Hello world';
}

function postHome(array $request)
{
    header("Content-Type: application/json");
    echo json_encode($request['query']);
}

function getPing(array $request)
{
    echo 'pong';
}
