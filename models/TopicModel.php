<?php

include_once __DIR__ . '/../classes/DB.php';

class TopicModel
{
    public static function allTopics()
    {
        $query = "SELECT * FROM topics";
        return DB::query($query)->fetchAll();
    }

    public static function getTopic($id)
    {
        $query = "SELECT * FROM threads where topic_id = $id";
        return DB::query($query)->fetchAll();
    }
}