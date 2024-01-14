<?php
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ($_SERVER['SERVER_PORT'] == 8080 && $uri === '/') {
    echo 'Hello world';
} elseif ($_SERVER['SERVER_PORT'] == 8000 && $uri === '/') {
    readfile('index.html');
} else {
    http_response_code(404);
    echo 'Not Found';
}
