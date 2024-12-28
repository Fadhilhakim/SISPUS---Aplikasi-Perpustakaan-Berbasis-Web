<?php

class Database {
    private static $connection;

    public static function getConnection() {
        if (self::$connection === null) {
            try {
                $host = 'localhost';
                $dbname = 'db_perpustakaan';
                $username = 'root';
                $password = '';
                
                // Inisialisasi koneksi
                $dsn = "mysql:host=$host;port=55250;dbname=$dbname";
                self::$connection = new PDO($dsn, $username, $password);
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die('Connection failed: ' . $e->getMessage());
            }
        }
        return self::$connection;
    }
}
