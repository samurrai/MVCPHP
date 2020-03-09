<?php

namespace Models;

use Core\_abstracts\Model;
use Core\Password;
use Exception;

class Users extends Model 
{
    protected static $table = 'Users';

    public static function make(string $username, string $password) : bool
    {
        if(self::has(['username' => $username])){
            throw new Exception('Username already exists');
        }        
    
        self::insert([
            'username' => $username,
            'password_hash' => Password::hash($password)
        ]);
    
        return self::has(['username' => $username]);
    }
}

