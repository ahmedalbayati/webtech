<?php

include_once 'Controller.php';
include_once __DIR__ . '/../models/ThreadModel.php';
include_once 'MessageController.php';

class ThreadController extends Controller
{
    public static function show($id)
    {
        $messages = ThreadModel::getThread($id);
        self::render('resources/threads/show', $messages);
    }

    public static function create($user_id, $topic_id, $subject)
    {
        
    }
}
