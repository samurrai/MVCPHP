<?php

namespace Core;

use Medoo\Medoo;

class Db extends Medoo{
    
    private static $inst;

    public function __construct()
    {
        parent::__construct(config('database'));
    }

    public static function inst(){
        if(!self::$inst instanceof self)
            self::$inst = new self();

        return static::$inst;
    }
}