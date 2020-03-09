<?php

namespace Core\_abstracts;

use Core\Db;

abstract class Model{
    protected static $table;

    public function getTable()
    {
        return static::$table;
    }

    
    public static function __callStatic($name, $arguments){
        array_unshift($arguments, static::$table);
        return call_user_func_array([Db::inst(), $name], $arguments);
    }
}