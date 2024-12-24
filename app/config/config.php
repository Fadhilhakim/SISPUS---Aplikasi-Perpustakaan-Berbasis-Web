<?php
return [
    'DB_HOST' => getenv('MYSQLHOST') ?: 'mysql.railway.internal', // Ganti dengan hostname Railway yang benar
    'DB_NAME' => getenv('MYSQLDATABASE') ?: 'db_perpustakaan',
    'DB_USER' => getenv('MYSQLUSER') ?: 'root',
    'DB_PASS' => getenv('MYSQLPASSWORD') ?: 'OnexSTQKDlZQeALJQzTYWPCuelMjHhGN',
    'DB_PORT' => getenv('MYSQLPORT') ?: '3306',
];
