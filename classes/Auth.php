<?php

require_once 'DB.php';
require_once __DIR__ . '/../controllers/Controller.php';
require_once __DIR__ . '/../controllers/TopicController.php';

class Auth
{
    public static function signup($first_name, $last_name, $email, $password)
    {
        $query = "INSERT INTO users (id, first_name, last_name, email, password, is_admin, created_at) VALUES (NULL, '$first_name', '$last_name', '$email', '$password', '0', CURRENT_TIMESTAMP)";
        DB::query($query);
        header("Location: /");
    }

    public static function login($email, $password)
    {
        $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
        $rows = DB::query($query)->fetchAll();

        if ($rows) {
            $_SESSION['user'] = $rows[0]['id'];
        }
        header("Location: /");
    }

    public static function logout()
    {
        setcookie(session_name(), '', 100);
        session_unset();
        session_destroy();
        $_SESSION = array();
        header("Location: /");
    }

    public static function getFullName() {

    }
}
