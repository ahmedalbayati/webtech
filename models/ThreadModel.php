<?php

class ThreadModel
{
    public static function getThread($id)
    {
        $query1 = "SELECT * FROM messages where thread_id = $id";
        $query2 = "SELECT subject FROM threads where id = $id";

        $messages = DB::query($query1)->fetchAll();
        $subject = DB::query($query2)->fetchAll();

        $messages['subject'] = $subject[0]['subject'];

        return $messages;
    }
}
