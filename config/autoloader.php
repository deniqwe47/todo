<?php

class Autoloader
{
    public static function load($class)
    {

//        var_dump($class); echo '<hr />';
        require dirname(__DIR__) . __NAMESPACE__ . '/' . str_replace('\\', '/', $class) . '.php';
    }

    public function init()
    {
        spl_autoload_register("Autoloader::load");
    }
}

