<?php

include_once __DIR__ . '/../classes/DB.php';

class MessageModel
{
    public static function create($thread_id, $user_id, $content)
    {
        $query = "INSERT INTO messages (id, user_id3, thread_id3, created_at, content) VALUES (NULL, '$user_id', '$thread_id', CURRENT_TIMESTAMP(), '$content')";
        DB::query($query);
    }
}
