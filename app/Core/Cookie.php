<?php

namespace Core;

final class Cookie
{
    private function __construct()
    {}

    public static function set(string $name, string $value = '', $expire = 0, $secure = false, $httponly = false){
        setcookie(md5($name), $value, $expire, '/', "", $secure, $httponly);
    }
    
    public static function get($key){
        return $_COOKIE[md5($key)] ?? null;
    }
}