<?php
class DbConnect
{
    private static $connection;
    public static function createConnection()
    {
        if (!isset(self::$connection))
        {
            $url = getenv('DB_URL');
            $user = getenv('DB_USER');
            $pass = getenv('DB_PASS');
            $db = getenv('DB_NAME');
            $port = getenv('DB_PORT');
            self::$connection = new mysqli($url, $user, $pass, $db, $port);
            if (self::$connection->connect_error)
            {
                die("Connection failed: " . self::$connection->connect_error);
            }
        }
        return self::$connection;
    }
}
?>