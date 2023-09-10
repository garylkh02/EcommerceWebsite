<?php
    $host = 'localhost';
    $db = 'web';
    $user = 'lee';
    $pass = 'lee123';

    $attr = "mysql:host=$host;dbname=$db";
    $table = 'cust_info';
    $opts = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];
?>