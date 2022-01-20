<?php

include_once 'Controller.php';
include_once __DIR__ . '/../models/TopicModel.php';

class TopicController extends Controller
{
    public static function index()
    {
        $topics = TopicModel::allTopics();
        self::render('resources/topics/index', $topics);
    }

    public static function show($id) {
        $topic = TopicModel::getTopic($id);
        self::render('resources/topics/show', $topic);
    }
}
