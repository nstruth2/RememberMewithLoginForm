<?php
    define('USER', '');
    define('PASSWORD', '');
    define('HOST', 'localhost');
    define('DATABASE', 'school');
    try {
        $connection = new PDO("mysql:host=".HOST.";dbname=".DATABASE, USER, PASSWORD);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        exit("Error: " . $e->getMessage());
    }
?>