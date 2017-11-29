<?php

namespace classes;

ini_set('display_errors', 'On');
error_reporting(E_ALL);

define('DATABASE', 'bv98');
define('USERNAME', 'bv98');
define('PASSWORD', 'dvJjpozdZ');
define('CONNECTION', 'sql1.njit.edu');

class dbConn{
    protected static $db;
    private function __construct() {
        try {
            self::$db = new \PDO( 'mysql:host=' . CONNECTION .';dbname=' . DATABASE, USERNAME, PASSWORD );
            self::$db->setAttribute( \PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION );
            echo "Connected successfully to db <br><br>";
        }
        catch (\PDOException $e) {
            echo "Connection Error: " . $e->getMessage();
        }
    }
    public static function getConnection() {
        if (!self::$db) {
            new dbConn();
        }
        return self::$db;
    }
}

?>