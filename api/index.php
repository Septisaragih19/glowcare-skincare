<?php

// Buat direktori sementara di /tmp jika belum ada
$dirs = [
    '/tmp/storage/framework/views',
    '/tmp/storage/framework/data',
    '/tmp/storage/framework/sessions',
    '/tmp/storage/framework/cache',
    '/tmp/storage/logs',
    '/tmp/bootstrap/cache',
];

foreach ($dirs as $dir) {
    if (!is_dir($dir)) {
        @mkdir($dir, 0755, true);
    }
}

require __DIR__ . '/../public/index.php';