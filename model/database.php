<?php
class Database{
    private static $username = 'iy9';
    private static $password = 'ICLrbjKM';
    private static $dsn = "mysql:host=sql1.njit.edu;dbname=iy9";
    private static $db;
    public static function getDB () {
    if (!isset(self::$db)) {
        try {
            self::$db = new PDO(self::$dsn,
                self::$username,
                self::$password,
                [ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ]);
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            include('../errors/database_error.php');
            exit();
        }
    }
    return self::$db;
}
}

?>