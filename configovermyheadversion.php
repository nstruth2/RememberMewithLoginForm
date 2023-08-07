<?php
    define('USER', '');
    define('PASSWORD', '');
    define('HOST', 'localhost');
    define('DATABASE', 'school');
    try {
        $connection = new PDO("mysql:host=".HOST.";dbname=".DATABASE, USER, PASSWORD);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $connection->setAttribute(PDO::ATTR_EMULATE_PREPARES   => false);
    } catch (PDOException $e) {
        exit("Error: " . $e->getMessage());
    }
?>

<?php
$host = 'localhost';
$db   = 'school';
$user = '';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
     PDO::ATTR_EMULATE_PREPARES   => false,
];
try {
     $con = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
?>