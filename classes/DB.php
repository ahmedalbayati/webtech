<?php

/**
 * Abstract functions for working with the database.
 */
class DB
{
    /**
     * Connect to the database using mysqli.
     *
     * @return mysqli
     */
    protected static function connect()
    {
        return new mysqli("localhost", "root", "", "forum");
    }

    /**
     * Fetch each row into an array for a provided table name.
     *
     * @param $table
     * @return array|mixed
     */
    public static function getAll($table)
    {
        $mysqli = self::connect();
        $result = $mysqli->query("SELECT * FROM $table");

        return $result->fetch_all();
    }
}
