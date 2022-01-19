<?php

include_once __DIR__ . '/../classes/DB.php';

/**
 * CRUD functions for working with the user.
 */
class UserModel extends DB
{
    /**
     * Creates a new user.
     *
     * @param $first_name
     * @param $last_name
     * @param $email
     * @param $password
     * @return void
     */
    public static function create($first_name, $last_name, $email, $password)
    {
        $mysqli = DB::connect();

        $insert = "INSERT INTO users (id, first_name, last_name, email, password, is_admin, created_at)";
        $values = " VALUES (NULL, '$first_name', '$last_name', '$email', '$password', '0', CURRENT_TIMESTAMP)";
        $query = $insert . $values;

        $mysqli->query($query);
    }

    /**
     * @param $id
     * @return array|false|mixed|null
     */
    public static function read($id)
    {
        $mysqli = DB::connect();

        $result = $mysqli->query("SELECT * FROM users WHERE id = '$id'");

        return $result->fetch_array();
    }

    /**
     * @param $email
     * @param $password
     * @return bool
     */
    public static function exists($email, $password)
    {
        $mysqli = DB::connect();

        $result = $mysqli->query("SELECT * FROM users WHERE email='$email' AND password='$password'");

        if ($result->fetch_row()) {
            return True;
        }

        return False;
    }
}
