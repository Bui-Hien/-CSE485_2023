<?php
$host = 'mariadb';
$port = '3306';
$db = 'BTTH02_1';
$user = 'root';
$pass = 'your_password';
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];
$dsn = "mysql:host=$host;port=$port;dbname=$db}";
try {
    $connection = new PDO($dsn, $this->user, $this->pass, $this->options);
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>
