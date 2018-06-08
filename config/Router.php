<?php

namespace config;

use controller\TodoListController;

class Router
{

    protected static $route = [];
    protected static $routes = [];

    public static function add($regexp, $route = [])
    {
        self::$routes[$regexp] = $route;
    }

    public static function getRoutes()
    {
        return self::$routes;
    }

    public static function getRoute()
    {
        return self::$route;
    }

    public static function matchRoute($url)
    {
        foreach (self::$routes as $pattern => $route) {
            if ($url == $pattern) {
                self::$route = $route;
                return true;
            }
        }
        return false;
    }

    public static function dispatch($url)
    {
        if (self::matchRoute($url)) {

            $controller = self::$route['controller'] . 'Controller';
            if (file_exists('controller/' . $controller . '.php')) {
//                $obj = new $controller;
                $obj = new TodoListController();
                $action = 'action' . self::$route['action'];

                if (method_exists($obj, $action)) {
                    $obj->$action();

                } else {
                    echo 'Action ' . $action . ' not found';
                }
            } else {
                echo 'Controller ' . $controller . ' not found';
            }
        } else {
            header('HTTP/1.0 404 Not Found');
        }
    }

}