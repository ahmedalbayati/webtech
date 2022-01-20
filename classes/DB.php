<?php

include_once __DIR__ . '/../config/Settings.php';

/**
 * Abstract functions for working with the database.
 */
class DB
{
    /**
     * Make a persistent connection to the database using PDO.
     *
     * @return PDO
     */
    protected static function connect()
    {
        $dsn = 'mysql:host=' . Settings::DB_HOST . ';dbname=' . Settings::DB_NAME;
        $username = Settings::DB_USER;
        $password = Settings::DB_PASS;

        try {
            return new PDO($dsn, $username, $password, array(PDO::ATTR_PERSISTENT => true));
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            return null;
        }
    }

    /**
     * Fetch each row into an array for a provided table name.
     *
     * @param $table
     * @return array
     */
    public static function getAll($table)
    {
        $dbh = self::connect();
        if ($dbh == null) {
            die();
        }

        $rows = $dbh->query("SELECT * FROM $table");

        return $rows->fetchAll();
    }
}
