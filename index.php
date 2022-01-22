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

/*
 * Users
 */
Route::get('', function () {
    $topics = TopicModel::allTopics();
    Route::render('resources/topics/index', $topics);
});
Route::get('register', function () {
    Route::render('resources/users/register');
});
Route::get('login', function () {
    Route::render('resources/users/login');
});
Route::get('logout', function () {
    Auth::logout();
});
Route::post('/login', function () {
    $email = $_POST['email'];
    $password = $_POST['password'];

    Auth::login($email, $password);
    Route::render('template');
});
Route::post('/register', function () {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    Auth::signup($first_name, $last_name, $email, $password);
});

/*
 * Topics
 */
Route::get('topic', function () {
    $topic = TopicModel::getTopic(explode("/", $_SERVER['REQUEST_URI'])[2]);
    Route::render('resources/topics/show', $topic);
});

/*
 * Threads
 */
Route::get('thread', function () {
    if (explode("/", $_SERVER['REQUEST_URI'])[2] == 'create') {
        Route::render('resources/threads/create');
        exit();
    }
});
Route::get('thread', function () {
    $messages = ThreadModel::getThread(explode("/", $_SERVER['REQUEST_URI'])[2]);
    Route::render('resources/threads/show', $messages);
});

/*
 * Messages
 */
Route::post('/message', function () {
    $content = $_POST['content'];
    $thread_id = $_POST['thread_id'];
    $user_id = $_POST['user_id'];

    MessageModel::create($thread_id, $user_id, $content);
});
