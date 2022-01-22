<?php

include_once __DIR__ . '/../classes/DB.php';

class MessageModel
{
    public static function create($thread_id, $user_id, $content)
    {
        $query = "INSERT INTO messages (id, user_id, thread_id, created_at, content, validated_by) VALUES (NULL, '$user_id', '$thread_id', CURRENT_TIMESTAMP(), '$content', 1)";
        DB::query($query);
        header("Location: /thread/" . $thread_id);
    }
}
