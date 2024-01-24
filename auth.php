<?php
declare(strict_types=1);

include_once('storage.php');

function initializeUserToken(): string
{
    $tokenKey = 'userToken';
    $userIdKey = 'userId';

    if (getValue($tokenKey) === null) {
        $token = generateToken();
        saveValue($tokenKey, $token);

        $userId = generateToken();
        saveValue($userIdKey, $userId);
    }

    return getValue($tokenKey);
}

function generateToken(): string
{
    return bin2hex(random_bytes(16));
}

function getUserId(): string
{
    $userIdKey = 'userId';
    return getValue($userIdKey) ?? generateToken();
}
