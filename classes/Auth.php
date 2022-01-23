<?php

/**
 * This class contains functions that handle everything related to users and their authentication.
 * The authentication is currently implemented by using sessions.
 */
class Auth
{
    /**
     * Authenticates the user by checking whether the combination of the email and password is
     * present in the database.
     *
     * If the user is found it sets the 'id' of the row inside the 'user' session variable.
     *
     * Finally, the user is redirected to the homepage.
     *
     * @param string $email
     * @param string $password
     *
     * @return void
     */
    public static function login(string $email, string $password)
    {
        $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
        $rows = DB::query($query)->fetchAll();

        if ($rows) {
            $_SESSION['user'] = $rows[0]['id'];
        }

        header("Location: /");
    }

    /**
     * Logs the user out and redirects the client to the homepage.
     *
     * @return void
     */
    public static function logout()
    {
        setcookie(session_name(), '', 100);
        session_unset();
        session_destroy();
        $_SESSION = array();
        header("Location: /");
    }

    /**
     * Creates a new user inside the database.
     *
     * Afterwards it authenticates the user with the login function.
     *
     * @param string $first_name
     * @param string $last_name
     * @param string $email
     * @param string $password
     *
     * @return void
     */
    public static function signup(string $first_name, string $last_name, string $email, string $password)
    {
        $query = "INSERT INTO users (id, first_name, last_name, email, password, is_admin, created_at) VALUES (NULL, '$first_name', '$last_name', '$email', '$password', '0', CURRENT_TIMESTAMP)";

        DB::query($query);

        self::login($email, $password);
    }

    /**
     * Checks if the client is currently logged in by checking the 'user' session variable.
     *
     * @return bool
     */
    public static function is_logged_in(): bool
    {
        return isset($_SESSION['user']);
    }

    /**
     * Checks whether the currently logged-in user is an admin.
     *
     * This is done by fetching the 'is_admin' column from the 'users' table inside the database.
     *
     * @return false|mixed
     */
    public static function is_admin()
    {
        if (!self::is_logged_in()) return false;

        $id = $_SESSION['user'];
        $query = "SELECT * FROM users WHERE id='$id'";
        $user = DB::query($query)->fetchAll();

        return $user[0]['is_admin'];
    }
}
