<?php

namespace Lib;
use Lib\Pages;

class Router {
    private static array $routes = [];

    public static function add(string $method, string $action, Callable $controller): void {
        $action = trim($action, '/');
        self::$routes[$method][$action] = $controller;   
    }

    public static function dispatch(): void {
        $method = $_SERVER['REQUEST_METHOD'];
        $action = preg_replace('/PROYECTO_ZESARI\/public/', '', $_SERVER['REQUEST_URI']);
        $action = trim($action, '/');
        $params = [];

        $routeFound = false;
        foreach (self::$routes[$method] as $route => $controller) {
            $pattern = self::generatePattern($route);
            if (preg_match($pattern, $action, $matches)) {
                $params = array_slice($matches, 1);
                $routeFound = true;
                break;
            }
        }

        if ($routeFound) {
            $callback = self::$routes[$method][$route];
            echo call_user_func_array($callback, $params);
        } else {
            $pages = new Pages();
            $pages->render('navegacion/paginaNoEncontrada');
            // echo 'Página no encontrada';
        }
    }

    private static function generatePattern(string $route): string {
        $pattern = '/^' . preg_quote($route, '/') . '$/';
        $pattern = preg_replace('/\\\:[A-Za-z0-9\_\-]+/', '([^\/]+)', $pattern);
        return $pattern;
    }
}
