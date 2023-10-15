<?php
class DbConnect
{
    private static $connection;
    public static function createConnection()
    {
        if (!isset(self::$connection))
        {
            $config = parse_ini_file($_SERVER['DOCUMENT_ROOT'] . "/config.ini");
            self::$connection = new mysqli($config['host'], $config['username'], $config['password'], $config['dbname']);
        }
        if (self::$connection === false)
        {
            return false;
        }
        return self::$connection;
    }
}
?>