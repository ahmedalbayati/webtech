<?php

/**
 * This class makes it easier for us to work with PDO.
 * PDO is an interface PHP provides, that allows us to interact with our database.
 */
class DB
{
    /**
     * Make a persistent connection to the database.
     * The credentials are provided by the 'Settings' class.
     *
     * @return PDO
     */
    private static function connect(): ?PDO
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

    /**
     * Execute a SQL query.
     *
     * @param string $query
     *
     * @return false|PDOStatement|void
     */
    public static function query(string $query)
    {
        $connection = self::connect();

        // $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if ($connection == null) {
            die();
        }

        return $connection->query($query);
    }
}
