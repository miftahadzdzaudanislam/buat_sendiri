<?php
    $host = 'localhost';
    $db = 'coba_produk';
    $user = 'root';
    $pass = '';
    $charset = 'utf8mb4';

    $dsn = "mysql: host=$host; dbname=$db; charset=$charset";

    $otp = [
        PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES=>false,
    ];

    $koneksi = new PDO($dsn, $user, $pass, $otp);
?>