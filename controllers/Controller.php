<?php

/**
 * Functions that all controllers should have.
 */
class Controller
{
    /**
     * @param $viewName
     * @return void
     */
    public static function render($viewName, array $data = [])
    {
        if (count($data)) {
            extract($data);
        }

        $path1 = __DIR__ . '/views/' . $viewName . '.php';
        $path2 = __DIR__ . '/../views/' . $viewName . '.php';

        if (file_exists($path1)) {
            require_once $path1;
        }
        if (file_exists($path2)) {
            require_once $path2;
        }
    }
}
