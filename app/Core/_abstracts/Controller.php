<?php


namespace Core\_abstracts;

//use Core\_Interfaces\IController;

abstract class Controller //implements IController
{
    private static $inst;

    public function render($tamplate, array $vars = [])
    {
        return view($tamplate, $vars);
    }

    public static function inst(){
        if (!self::$inst instanceof self) {
            self::$inst = new self();
        }

        return self::$inst;
    }
}
