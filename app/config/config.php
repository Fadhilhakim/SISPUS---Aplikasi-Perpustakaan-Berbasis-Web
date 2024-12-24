<?php
return [
    'DB_HOST' => getenv('MYSQLHOST') ?: '127.0.0.1',
    'DB_NAME' => getenv('MYSQLDATABASE') ?: 'db_perpustakaan',
    'DB_USER' => getenv('MYSQLUSER') ?: 'root',
    'DB_PASS' => getenv('MYSQLPASSWORD') ?: '',
    'DB_PORT' => getenv('MYSQLPORT') ?: '3306',
];
