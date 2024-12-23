<?php

class Database {
    private static $connection;
    
    public static function getConnection() {
        if (self::$connection === null) {
            try {
                // Ganti dengan informasi koneksi yang sesuai dengan database Anda
                self::$connection = new PDO('mysql:host=127.0.0.1;dbname=db_perpustakaan', 'root', '');
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die('Connection failed: ' . $e->getMessage());
            }
        }
        return self::$connection;
    }
    
}