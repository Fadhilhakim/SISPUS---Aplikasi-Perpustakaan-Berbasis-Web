<?php

class Database {
    private static $connection;

    public static function getConnection() {
        if (self::$connection === null) {
            try {
                $config = include __DIR__ . '/../config/config.php';

                $host = $config['DB_HOST'];
                $dbname = $config['DB_NAME'];
                $username = $config['DB_USER'];
                $password = $config['DB_PASS'];
                $port = $config['DB_PORT'];
                
                // Inisialisasi koneksi
                $dsn = "mysql:host=$host;port=$port;dbname=$dbname";
                self::$connection = new PDO($dsn, $username, $password);
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die('Connection failed: ' . $e->getMessage());
            }
        }
        return self::$connection;
    }
}
