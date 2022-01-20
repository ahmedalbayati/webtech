<?php

// automatically include the classes and controllers
spl_autoload_register(function ($file_name) {
    $class_path = __DIR__ . '/classes/' . $file_name . '.php';
    $controller_path = __DIR__ . '/controllers/' . $file_name . '.php';

    if (file_exists($class_path)) {
        include_once $class_path;
    }
    if (file_exists($controller_path)) {
        include_once $controller_path;
    }
});

session_start();

require_once 'routes.php';
