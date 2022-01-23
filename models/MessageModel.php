<?php

class MessageModel
{
    public static function allMessages()
    {
        $query = "SELECT * FROM messages where validated_by IS NULL";
        $messages = DB::query($query);
        return $messages->fetchAll();
    }

    public static function getMessage()
    {
        //
    }

    public static function create($thread_id, $user_id, $content)
    {
        $query = "INSERT INTO messages (id, user_id, thread_id, created_at, content, validated_by) VALUES (NULL, '$user_id', '$thread_id', CURRENT_TIMESTAMP(), '$content', NULL)";
        DB::query($query);
        header("Location: /thread/" . $thread_id);
    }

    public static function update()
    {
        //
    }

    public static function delete()
    {
        //
    }
}
