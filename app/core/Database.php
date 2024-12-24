<?php

class Database {
    private static $connection;

    public static function getConnection() {
        if (self::$connection === null) {
            try {
                // Ambil konfigurasi dari file config.php
                $config = include __DIR__ . '/../config/config.php';

                $host = $config['DB_HOST'];
                $dbname = $config['DB_NAME'];
                $username = $config['DB_USER'];
                $password = $config['DB_PASS'];

                // Inisialisasi koneksi
                $dsn = "mysql:host=$host;dbname=$dbname";
                self::$connection = new PDO($dsn, $username, $password);
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die('Connection failed: ' . $e->getMessage());
            }
        }
        return self::$connection;
    }
}
