<?php

class Db
{
    private static $db_host = 'db';
    private static $db_user = 'root';
    private static $db_password = 'rootpass';
    private static $db_db = 'syntra';
    private static $db_port = 306;
    private static $pdo;

    public static function init()
    {
        try {
            self::$pdo = new PDO("mysql:host=" . self::$db_host . ";port=" . self::$db_port . ";dbname=" . self::$db_db, self::$db_user, self::$db_password);
            // set the PDO error mode to exception
            return self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            return null;
        }
    }

    public static function getData()
    {
        try {
            self::init();
            $stmt = self::$pdo->prepare("SELECT * FROM `tracks` ORDER BY ID ASC LIMIT 50");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
