<?php

// TODO: 404 page

// homepage
Route::get('', function () {
    Controller::displayView('template');
});

// register
Route::get('register', function () {
    Controller::displayView('template');
});
Route::post('/register', function () {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    UserController::create($first_name, $last_name, $email, $password);
});

// login
Route::get('login', function () {
    Controller::displayView('template');
});
Route::post('/login', function () {
    $email = $_POST['email'];
    $password = $_POST['password'];

    UserController::logIn($email, $password);
});

// user
Route::get('user', function () {
    $uri_components = explode("/", $_SERVER['REQUEST_URI']);

    UserController::read($uri_components[2]);
});
