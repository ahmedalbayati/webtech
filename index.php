<?php

/*
 * Automatically include models and other classes.
 */
spl_autoload_register(function ($file_name) {
    $class_path = __DIR__ . '/classes/' . $file_name . '.php';
    $model_path = __DIR__ . '/models/' . $file_name . '.php';

    if (file_exists($class_path)) {
        include_once $class_path;
    }
    if (file_exists($model_path)) {
        include_once $model_path;
    }
});

session_start();

require_once 'routes.php';
