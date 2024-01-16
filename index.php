<?php

include_once('request.php');


$backendRoutes = [
    '/'     => [
        'GET'  => 'getHome',
        'POST' => 'postHome'
    ],
    '/ping' => [
        'GET' => 'getPing'
    ],
];

$frontendRoutes = [
    '/' => [
        'GET' => 'getIndex',
    ],
];


$serverPort = $_SERVER['SERVER_PORT'];
$request = getCurrentRequest();


$targetRouter = 'frontendRoutes';
if ($serverPort === '8080'){
    $targetRouter = 'backendRoutes';
}


if (!array_key_exists($request['path'], $$targetRouter)) {
    http_response_code(404);
    echo 'Not Found';
    die();
}


$routePath = $$targetRouter[$request['path']];

if (!array_key_exists($request['method'], $routePath)) {
    http_response_code(405);
    die();
}else{
    call_user_func($routePath[$request['method']], $request);
}


function getIndex()
{
    readfile('index.html');
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
