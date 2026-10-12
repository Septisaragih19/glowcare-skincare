<?php

// 1. Buat folder sementara di /tmp jika belum ada
$dirs = [
    '/tmp/storage/framework/views',
    '/tmp/storage/framework/data',
    '/tmp/storage/framework/sessions',
    '/tmp/storage/framework/cache',
    '/tmp/storage/logs',
    '/tmp/bootstrap/cache',
    '/tmp/database',
];

foreach ($dirs as $dir) {
    if (!is_dir($dir)) {
        @mkdir($dir, 0755, true);
    }
}

// 2. Salin database.sqlite ke /tmp jika belum ada di /tmp
$sourceDb = __DIR__ . '/../database/database.sqlite';
$targetDb = '/tmp/database/database.sqlite';

if (!file_exists($targetDb)) {
    if (file_exists($sourceDb)) {
        copy($sourceDb, $targetDb);
    } else {
        touch($targetDb);
    }
}

// 3. Set environment variable secara dinamis untuk SQLite & Storage
$_ENV['DB_CONNECTION'] = 'sqlite';
$_ENV['DB_DATABASE'] = $targetDb;
$_ENV['APP_STORAGE_PATH'] = '/tmp/storage';
$_ENV['VIEW_COMPILED_PATH'] = '/tmp/storage/framework/views';
$_ENV['LOG_CHANNEL'] = 'stderr';

putenv("DB_CONNECTION=sqlite");
putenv("DB_DATABASE={$targetDb}");

require __DIR__ . '/../public/index.php';