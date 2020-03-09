<?php

namespace Core;

final class Password 
{
    private function __construct() {}

    public static function hash(string $password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    public static function verify(string $password, string $hash)
    {
        return password_verify($password, $hash);
    }
}
