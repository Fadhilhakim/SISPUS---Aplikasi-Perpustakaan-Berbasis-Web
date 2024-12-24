<?php
return [
    'DB_HOST' => getenv('RAILWAY_PRIVATE_DOMAIN') ?: 'mysql.railway.internal',
    'DB_NAME' => getenv('MYSQLDATABASE') ?: 'db_perpustakaan',
    'DB_USER' => getenv('MYSQLUSER') ?: 'root',
    'DB_PASS' => getenv('MYSQLPASSWORD') ?: 'OnexSTQKDlZQeALJQzTYWPCuelMjHhGN',
    'DB_PORT' => getenv('MYSQLPORT') ?: '3306',
];
