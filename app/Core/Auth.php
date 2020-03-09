<?php

namespace Core;

use Models\Users;

final class Auth  
{
    private function __construct()
    {}

    static function check()
    {
        return self::getUser() !== null;
    }

    static function getUser()
    {
        if (!$cookie = Cookie::get('auth'))
            return null;
        
        return Users::get('*', [
            'auth_token' => $cookie
        ]);
    }

    static function login($username, $password)
    {
        if (!$user = Users::get('*', ['username' => $username])) 
            return false;
        
        if (!Password::verify($password, $user['password_hash'])) 
            return false;
        
        $token = self::generateToken();

        Cookie::set('auth', $token, time() + 60 * 60 * 24 * 365);
        Users::update(['auth_token' =>$token], ['username' => $username]);

        return Users::has(['auth_token' => $token]);
    }

    
    static function logout()
    {
        if (!self::check()) {
            return true;
        }

        $cookie = Cookie::get('auth');
        Cookie::set('auth', "", time() - 1);

        Users::update([
            'auth_token' => null
        ], [
            'auth_token' => $cookie
        ]);

        return true;
    }

    static function generateToken()
    {
        return md5(hexdec(uniqid()));
    }

}
