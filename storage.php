<?php
declare(strict_types=1);

session_start();

function saveValue(string $key, string $value): void
{
    $_SESSION[$key] = $value;
}

function getValue(string $key): ?string
{
    return $_SESSION[$key] ?? null;
}
