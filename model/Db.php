<?php

namespace model;

use PDO;
use Exception;

class Db
{

    protected static $conn;

    private function __construct($conn)
    {
        self::$conn = $conn;
    }


    public static function connectDB()
    {
        if (empty(self::$conn)) {
            try {
                self::$conn = new PDO('mysql:host=localhost;dbname=todolist', 'root', 'astral');
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }
        return self::$conn;
    }

    public function __clone()
    {
        return false;
    }

    public function __wakeup()
    {
        return false;
    }

}
