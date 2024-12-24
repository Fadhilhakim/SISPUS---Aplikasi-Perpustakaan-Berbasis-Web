<?php

// Ambil konfigurasi database dari config.php
$config = include __DIR__ . 'config/config.php';

$host = $config['DB_HOST'];
$port = $config['DB_PORT'];
$dbname = $config['DB_NAME'];
$username = $config['DB_USER'];
$password = $config['DB_PASS'];

// Lokasi file SQL
$sqlFile = __DIR__ . 'db_perpustakaan.sql';

// Cek apakah file SQL tersedia
if (!file_exists($sqlFile)) {
    die("File SQL tidak ditemukan di path: $sqlFile");
}

try {
    // Baca file SQL
    $sql = file_get_contents($sqlFile);

    // Koneksi ke database
    $dsn = "mysql:host=$host;port=$port;dbname=$dbname";
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Eksekusi SQL
    $pdo->exec($sql);
    echo "Database berhasil diimport!";
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
