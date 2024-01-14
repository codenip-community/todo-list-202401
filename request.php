<?php

const CONTENT_TYPE_APPLICATION_JSON = 'application/json';
const CONTENT_TYPE_FORM_URL_ENCODED = 'application/x-www-form-urlencoded';
const HTTP_METHODS_SUPPORTING_BODY_PAYLOAD = ['POST', 'PUT', 'PATCH'];

function getCurrentRequest(): array
{
    $method = $_SERVER['REQUEST_METHOD'];

    return [
        'method' => $method,
        'path' => parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH),
        'query' => _queryData($method)
    ];
}

function _queryData(string $method): array
{
    if (!in_array($method, HTTP_METHODS_SUPPORTING_BODY_PAYLOAD)) {
        return $_GET;
    }

    $contentType = $_SERVER['CONTENT_TYPE'];

    if (str_contains($contentType, CONTENT_TYPE_APPLICATION_JSON)) {
        $jsonPayload = file_get_contents('php://input');
        $payload = json_decode($jsonPayload, true) ?? [];
        return array_merge($_GET, $payload);
    }

    if (str_contains($contentType, CONTENT_TYPE_FORM_URL_ENCODED)) {
        return array_merge($_GET, $_POST);
    }

    throw new RuntimeException(
        sprintf('Content-Type <%s> is not supported', $contentType)
    );
}
