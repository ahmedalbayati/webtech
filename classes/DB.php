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
    private static function connect()
    {
        $dsn = 'mysql:host=' . Settings::DB_HOST . ';dbname=' . Settings::DB_NAME;
        $username = Settings::DB_USER;
        $password = Settings::DB_PASS;

        try {
            return new PDO($dsn, $username, $password, array(PDO::ATTR_PERSISTENT => true));
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage();
            return null;
        }
    }

    public static function query($query)
    {
        $dbh = self::connect();

        // $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if ($dbh == null) {
            die();
        }

        return $dbh->query($query);
    }
}
