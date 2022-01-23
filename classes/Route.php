<?php

/**
 * This class contains functions that make it easy for us to handle different
 * types of requests inside our actual router ('index.php').
 */
class Route
{
    /**
     * Render a specified view to the screen.
     *
     * @param string $viewName
     *
     * @return void
     */
    public static function render(string $viewName)
    {
        $path = __DIR__ . '/../views/' . $viewName . '.php';

        if (file_exists($path)) {
            require_once $path;
        }
    }

    /**
     * Executes a specified function between rendering 'template_upper' and 'template_lower'.
     * This is done if it's a GET request and the URL matches the specified route.
     *
     * @param string $route
     * @param $function
     *
     * @return void
     */
    public static function get(string $route, $function)
    {
        $uri_components = explode("/", $_SERVER['REQUEST_URI']);

        if ($_SERVER['REQUEST_METHOD'] == 'GET' && $uri_components[1] == $route) {
            self::render('template_upper');
            $function->__invoke();
            self::render('template_lower');
        }
    }

    /**
     * Executes a function if it's a POST request and the URL matches the specified route.
     *
     * @param string $route
     * @param $function
     *
     * @return void
     */
    public static function post(string $route, $function)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_SERVER['REQUEST_URI'] == $route) {
            $function->__invoke();
        }
    }
}
