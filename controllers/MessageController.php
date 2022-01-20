<?php

include_once 'Controller.php';
include_once __DIR__ . '/../models/MessageModel.php';

class MessageController extends Controller
{
    public static function create($thread_id, $user_id, $content)
    {
        MessageModel::create($thread_id, $user_id, $content);
        header("Location: /thread/" . $thread_id);
    }
}
