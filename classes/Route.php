<?php

/**
 * Functions for working with routes.
 */
class Route
{
    /**
     * Runs a function if the URL matches the specified route.
     * It should also be a GET request.
     *
     * @param $route
     * @param $function
     *
     * @return void
     */
    public static function get($route, $function)
    {
        $uri_components = explode("/", $_SERVER['REQUEST_URI']);

        if ($_SERVER['REQUEST_METHOD'] == 'GET' && $uri_components[1] == $route) {
            Controller::render('template');
            $function->__invoke();
        }
    }

    /**
     * Runs a function if the URL matches the specified route.
     * It should also be a POST request.
     *
     * @param $route
     * @param $function
     *
     * @return void
     */
    public static function post($route, $function)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_SERVER['REQUEST_URI'] == $route) {
            $function->__invoke();
        }
    }

    /**
     * Render a specified view to the screen.
     *
     * @param $viewName
     * @param array $data
     *
     * @return void
     */
    public static function render($viewName, array $data = [])
    {
        if (count($data)) {
            extract($data);
        }

        $path = __DIR__ . '/../views/' . $viewName . '.php';

        if (file_exists($path)) {
            require_once $path;
        }
    }
}
