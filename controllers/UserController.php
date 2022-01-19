<?php

include_once 'Controller.php';
include_once __DIR__ . '/../classes/DB.php';
include_once __DIR__ . '/../models/UserModel.php';

/**
 *
 */
class UserController extends Controller
{
    /**
     * @param $first_name
     * @param $last_name
     * @param $email
     * @param $password
     * @return void
     */
    public static function create($first_name, $last_name, $email, $password)
    {
        UserModel::create($first_name, $last_name, $email, $password);
    }

    /**
     * @param $id
     * @return void
     */
    public static function read($id)
    {
        $user = UserModel::read($id);
        print_r($user);
    }

    /**
     * @param $email
     * @param $password
     * @return void
     */
    public static function logIn($email, $password)
    {
        if (UserModel::exists($email, $password)) echo "Logged In!";
        else echo "Does not exist!";
    }
}
