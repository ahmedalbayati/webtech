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
    public static function displayView($viewName)
    {
        require_once 'views/' . $viewName . '.php';
    }
}
