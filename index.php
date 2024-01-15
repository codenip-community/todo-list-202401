<?php

include_once('request.php');

$request = getCurrentRequest();

$routes = [
    '/'     => [
        'GET'  => 'getHome',
        'POST' => 'postHome'
    ],
    '/ping' => [
        'GET' => 'getPing'
    ],
];


if (!array_key_exists($request['path'], $routes)) {
    http_response_code(404);
    return 'Not Found';
}


$routePath = $routes[$request['path']];

if (!array_key_exists($request['method'], $routePath)) {
    http_response_code(405);
} else {
    call_user_func($routePath[$request['method']], $request);
}



function getHome(array $request)
{
    echo 'Hello world';
}

function postHome(array $request)
{
    echo json_encode(_queryData($request['method']));
}

function getPing(array $request)
{
    echo 'pong';
}
