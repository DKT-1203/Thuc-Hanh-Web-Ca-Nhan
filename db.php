<?php
function db(): PDO {
    // Khai báo đúng port 3307 của máy bạn
    $dsn = 'mysql:host=localhost;port=3307;dbname=web_ca_nhan;charset=utf8mb4';
    return new PDO($dsn, 'root', '', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
}
?>