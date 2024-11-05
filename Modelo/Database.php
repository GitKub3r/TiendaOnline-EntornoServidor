<?php

class Database
{
    private static $servername = "localhost:3306";
    private static $username = "root";
    private static $password = "";
    private static $dbname = "pruebas";
    private static $conn = null;
    public static function getConnection() {
        if (self::$conn === null) {
            try {
                self::$conn = new PDO("mysql:host=" . self::$servername . ";dbname=" . self::$dbname, self::$username, self::$password);
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Error de conexión: " . $e->getMessage();
            }
        }
        return self::$conn;
    }
}