<?php

Route::get('', function () {
     TopicController::index();
});

Route::get('register', function () { Controller::render('resources/users/register'); });
Route::get('login', function () { Controller::render('resources/users/login'); });
Route::get('logout', function () { Auth::logout(); });
Route::post('/login', function () {
    $email = $_POST['email'];
    $password = $_POST['password'];

    Auth::login($email, $password);
    Controller::render('template');
});
Route::post('/register', function () {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    Auth::signup($first_name, $last_name, $email, $password);
});



Route::get('topic', function () {
    TopicController::show(explode("/", $_SERVER['REQUEST_URI'])[2]);
});

Route::get('thread', function () {
    if (explode("/", $_SERVER['REQUEST_URI'])[2] == 'create') {
        Controller::render('resources/threads/create');
        exit();
    }
});

Route::get('thread', function () {
    ThreadController::show(explode("/", $_SERVER['REQUEST_URI'])[2]);
});

Route::post('/message', function () {
    $content = $_POST['content'];
    $thread_id = $_POST['thread_id'];
    $user_id = $_POST['user_id'];

    MessageController::create($thread_id, $user_id, $content);
});

Route::post('/thread', function () {

});
